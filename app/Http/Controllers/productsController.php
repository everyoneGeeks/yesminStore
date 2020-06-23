<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\subCategory;
use App\category;
use App\productImage;
use Carbon\Carbon;
/**                  _            _   
                    | |          | |  
 _ __  _ __ ___   __| |_   _  ___| |_ 
| '_ \| '__/ _ \ / _` | | | |/ __| __|
| |_) | | | (_) | (_| | |_| | (__| |_ 
| .__/|_|  \___/ \__,_|\__,_|\___|\__|
| |                                   
|_|        

 */
class productsController extends Controller
{

/**  
* show list of products
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){

    $products=product::with('category')->with('subcategory')->get();
    return view('pages.product.list',compact('products'));
    }
    /**  
    * show info of  products By id
    * @pararm int $id products id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $product=product::where('id',$id)->with('category')->with('subcategory')->with('images')->first();
        return view('pages.product.info',compact('product'));
    }
       
   /**  
    * show  form add  of  product 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(){
        $categories=category::with('subcategory')->get();
        return view('pages.product.add',compact('categories'));
    }    

    /**  
    * save add  of  product 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request){
    $rules=[
        'name_ar'=>'required|max:255',
        'name_en'=>'required|max:255',
        'main_image'=>'required|image',
        'subcategory'=>'required|not_in:0',
        'description_ar'=>'required',
        'description_en'=>'required',
        'price'=>'required',
        'amount'=>'required',
    
    ];

  
      $message=[
    'main_image.required'=>'يجب اختيار  صورة الرائيسية للمنتج ',
    'name_ar.required'=>'يجب ادخال اسم المنتج عربي  ',
    'name_en.required'=>'يجب ادخال اسم المنتج اجنبي ',
    "name_ar.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
    "name_en.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
    'description_ar.required'=>'يجب ادخال وصف المنتج عربي  ',
    'description_en.required'=>'يجب ادخال وصف المنتج اجنبي ',
    "subcategory.required"=>"يجب اختيار القسم  ",
    "subcategory.not_in"=>"يجب اختيار القسم  ",
    "price.required"=>" يجب ادخال  السعر   ",
    "amount.required"=>"  يجب ادخال الكمية المتاحة   ",

    ];
  
  
$request->validate($rules,$message);

        $category=subCategory::where('id',$request->subcategory)->first()->category_id;
        $product=new product;
    
        $product->name_ar=$request->name_ar;
        $product->name_en=$request->name_en;
        $product->description_ar=$request->description_ar;
        $product->description_en=$request->description_en;


        $product->category_id=$category;  
        $product->sub_category_id=$request->subcategory;

        if($request->hasFile('main_image')){
            $this->SaveFile($product,'main_image','main_image','upload/product');
        }
        $product->price=$request->price;  
        $product->amount=$request->amount;

        if($request->discount){
            $product->discount=$request->discount;

        }
        $product->created_at=Carbon::now();
        $product->save();



        if($request->hasFile('images')){
           

            foreach($request->images as $images){
                $productImages=new productImage();
                $filename = \Str::random(6).'_'.time().'.'.$images->getClientOriginalExtension();
                $images->move('upload/products',$filename );

                 $productImages->image="/upload/products/".$filename;
                 $productImages->product_id=$product->id;
                 $productImages->save();
            }
            
        }

        \Notify::success('تم اضافة منتج  جديد بنجاح', ' اضافة  منتج     ');
        return redirect()->back();
    }  



     /**  
    * show  form edit  of  product By id 
    * @pararm int $id product id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $categories=category::with('subcategory')->get();
        $product=product::where('id',$id)->with('category')->with('subcategory')->with('images')->first();

        return view('pages.product.edit',compact('product','categories'));
    }    

    /**  
    * save edit  of  product By id 
    * @pararm int $id product id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){

        $rules=[
            'name_ar'=>'required|max:255',
            'name_en'=>'required|max:255',
            'subcategory'=>'required|not_in:0',
            'description_ar'=>'required',
            'description_en'=>'required',
            'price'=>'required',
            'amount'=>'required', 
        ];

        $message=
        [
            'name_ar.required'=>'يجب ادخال اسم المنتج عربي  ',
            'name_en.required'=>'يجب ادخال اسم المنتج اجنبي ',
            "name_ar.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
            "name_en.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",

            'description_ar.required'=>'يجب ادخال وصف المنتج عربي  ',
            'description_en.required'=>'يجب ادخال وصف المنتج اجنبي ',

            "subcategory.required"=>"يجب اختيار القسم  ",
            "subcategory.not_in"=>"يجب اختيار القسم  ",

            "price.required"=>" يجب ادخال  السعر   ",
            "amount.required"=>"  يجب ادخال الكمية المتاحة   ",
        ];   
        
        $request->validate($rules,$message);


        $category=subCategory::where('id',$request->subcategory)->first()->category_id;
        $product=product::where('id',$id)->first();
    
        $product->name_ar=$request->name_ar;
        $product->name_en=$request->name_en;
        $product->description_ar=$request->description_ar;
        $product->description_en=$request->description_en;


        $product->category_id=$category;  
        $product->sub_category_id=$request->subcategory;

        if($request->hasFile('main_image')){
            $this->SaveFile($product,'main_image','main_image','upload/product');
        }
        $product->price=$request->price;  
        $product->amount=$request->amount;

        if($request->discount){
            $product->discount=$request->discount;

        }
        $product->save();


        \Notify::success('تم تعديل بيانات المنتج   بنجاح', ' تعديل بيانات المنتج    ');
        return redirect()->back();
    }  



    /**  
    * save add || delete photo  of  product By id 
    * @param int $id product id  || image id
    * @param INT $request->action (add || delete)
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function uploadProductImage(Request $request,$id){


        if($request->action =='add'){
            if($request->hasFile('images')){
           

                foreach($request->images as $images){
                    $productImages=new productImage();
                    $filename = \Str::random(6).'_'.time().'.'.$images->getClientOriginalExtension();
                    $images->move('upload/products',$filename );
    
                     $productImages->image="/upload/products/".$filename;
                     $productImages->product_id=$id;
                     $productImages->save();
                }
                
            }
            \Notify::success('تم اضافة صورة   المنتج   بنجاح', ' اضافة صور المنتج    ');

        }


        if($request->action =="delete"){
            $productImage=productImage::where('id',$id)->delete();
            \Notify::success('تم حذف  الصورة   بنجاح', ' تعديل حذف الصورة    ');

        }

       


        return redirect()->back();
    }  





/**  
* delete(soft delete ) product By id
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function deleteProduct($id){
    $product=product::where('id',$id)->delete();
    \Notify::success('تم حذف  المنتج   بنجاح', ' تم الحذف بنجاح    ');
    return redirect()->back();
}  





}
