<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subCategory;
use App\category;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| subCategoriesController
|--------------------------------------------------------------------------
| this will handle all subCategory part (CRUD) 
|
*/
/**
           _      _____      _                              
          | |    / ____|    | |                             
 ___ _   _| |__ | |     __ _| |_ ___  __ _  ___  _ __ _   _ 
/ __| | | | '_ \| |    / _` | __/ _ \/ _` |/ _ \| '__| | | |
\__ \ |_| | |_) | |___| (_| | ||  __/ (_| | (_) | |  | |_| |
|___/\__,_|_.__/ \_____\__,_|\__\___|\__, |\___/|_|   \__, |
                                      __/ |            __/ |
                                     |___/            |___/ 
 */
class subcategoiesController extends Controller
{
/**  
* show list of subCategory
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){

    $subCategories=subCategory::with('category')->get();
    return view('pages.subCategory.list',compact('subCategories'));
    }
    /**  
    * show info of  subCategory By id
    * @pararm int $id subCategory id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $subCategory=subCategory::where('id',$id)->with('category')->first();
        return view('pages.subCategory.info',compact('subCategory'));
    }
       

     /**  
    * show  form edit  of  subCategor By id 
    * @pararm int $id subCategor id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $category=category::get();
        $subCategory=subCategory::where('id',$id)->with('category')->first();
        return view('pages.subCategory.edit',compact('subCategory','category'));
    }    

    /**  
    * save edit  of  subCategor By id 
    * @pararm int $id subCategor id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){

        $rules=['name_ar'=>'required|max:255','name_en'=>'required|max:255','category_id'=>'required|not_in:0'];

        $message=
        ['name_ar.required'=>'يجب ادخال اسم القسم ',
        'name_en.required'=>'يجب ادخال اسم القسم',
        "name_ar.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
        "name_en.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
        "category_id.required"=>"يجب اختيار القسم الرئيسي ",
        "category_id.not_in"=>"يجب اختيار القسم الرئيسي ",
        ];   
        
        $request->validate($rules,$message);

        $subCategor=subCategory::where('id',$id)->first();
        $subCategor->name_ar=$request->name_ar;
        $subCategor->name_en=$request->name_en;
        if($request->hasFile('image')){
            $this->SaveFile($subCategor,'image','image','upload/subCategor');
        }
        if($request->category_id !== 0){
            $subCategor->category_id=$request->category_id;  
        }


        $subCategor->created_at=Carbon::now();
        $subCategor->save();

        \Notify::success('تم تعديل بيانات القسم الفرعي بنجاح', ' تعديل بيانات القسم الفرعي   ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  subCategor 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(){
        $category=category::get();
        return view('pages.subCategory.add',compact('category'));
    }    

    /**  
    * save add  of  subCategor 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request){
    $rules=['name_ar'=>'required|max:255','name_en'=>'required|max:255','image'=>'required|image','category_id'=>'required|not_in:0'];
  
  
      $message=[
    'name_ar.required'=>'يجب ادخال اسم القسم ',
    'name_en.required'=>'يجب ادخال اسم القسم',
    'image.required'=>'يجب اختيار  صورة للقسم',
    'image.image'=>'يجب اختيار',
    "name_ar.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
    "name_en.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
    "category_id.required"=>"يجب اختيار القسم الرئيسي ",
    "category_id.not_in"=>"يجب اختيار القسم الرئيسي ",
    ];
  
  
$request->validate($rules,$message);

        $subCategor=new subCategory;
    
        $subCategor->name_ar=$request->name_ar;
        $subCategor->name_en=$request->name_en;
        if($request->hasFile('image')){
            $this->SaveFile($subCategor,'image','image','upload/subCategor');
        }
        $subCategor->category_id=$request->category_id;  
        $subCategor->created_at=Carbon::now();
        $subCategor->save();

        \Notify::success('تم اضافة قسم جديد بنجاح', ' اضافة  القسم الفرعي   ');
        return redirect()->back();
    }  





/**  
* delete(soft delete ) subCategory By id
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function deleteSubcategory($id){
    $subcategory=subCategory::where('id',$id)->delete();
    \Notify::success('تم حذف  القسم الفرعي  بنجاح', ' تم الحذف بنجاح    ');
    return redirect()->back();
}        
    
}
