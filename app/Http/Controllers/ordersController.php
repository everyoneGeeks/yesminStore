<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| ordersController
|--------------------------------------------------------------------------
| this will handle all orders part (R) 
|
*/
/**
 *                    _               
 *                   | |              
 *       ___  _ __ __| | ___ _ __ ___ 
 *      / _ \| '__/ _` |/ _ \ '__/ __|
 *     | (_) | | | (_| |  __/ |  \__ \
 *      \___/|_|  \__,_|\___|_|  |___/
 *                                    
 *                                    
 */
class ordersController extends Controller
{
/**  
* show list of category
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $orders=Orders::with('user')->with('provider')->get();
    return view('pages.order.list',compact('orders'));
    }
    /**  
    * show info of  order By id
    * @pararm int $id order id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $order=Orders::where('id',$id)->with('user')->with('provider')->with(['services'=>function($q){
            $q->with('beauty');
        }])->first();
        return view('pages.order.info',compact('order'));
    }
    /**  
    * change status of category (active / deactive)
    * @pararm int $id category id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function status($id){
        $category=category::where('id',$id)->first();
    
        if($category->is_active == 0){
            $category->is_active = 1;
            $category->save();
            \Notify::success('تم تفعيل القسم بنجاح', 'تغير حالة القسم  ');
        }else{
            $category->is_active = 0;
            $category->save();
            \Notify::success('تم الغاء تفعيل القسم بنجاح', 'تغير حالة القسم ');
        }
    
        return redirect()->back();
    }

    /**  
    * show  form edit  of  category By id 
    * @pararm int $id category id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $category=category::where('id',$id)->first();
        return view('pages.categories.edit',compact('category'));
    }    

    /**  
    * save edit  of  category By id 
    * @pararm int $id category id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){

        $rules=['name_ar'=>'required','name_en'=>'required'];
        $message=['name_ar.required'=>'يجب ادخال اسم القسم ','name_en.required'=>'يجب ادخال اسم القسم'];
        $request->validate($rules,$message);

        $category=category::where('id',$id)->first();
        $category->name_ar=$request->name_ar;
        $category->name_en=$request->name_en;
        $category->is_active=$request->active ? $request->active : 0;
        if($request->hasFile('logo')){
            $this->SaveFile($category,'logo','logo','upload/category');
        }

        $category->created_at=Carbon::now();
        $category->save();

        \Notify::success('تم تعديل بيانات القسم بنجاح', ' تعديل بيانات القسم   ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  category 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(){
        return view('pages.categories.add');
    }    

    /**  
    * save add  of  category 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request){

    $rules=['name_ar'=>'required','name_en'=>'required','logo'=>'required|image'];
    $message=['name_ar.required'=>'يجب ادخال اسم القسم ','name_en.required'=>'يجب ادخال اسم القسم','logo.required'=>'يجب اختيار  صورة للقسم','logo.image'=>'يجب اختيار  صورة للقسم'];
$request->validate($rules,$message);
        $category=new category;
        $category->name_ar=$request->name_ar;
        $category->name_en=$request->name_en;
        $category->is_active=$request->active ? $request->active : 0;
        if($request->hasFile('logo')){
            $this->SaveFile($category,'logo','logo','upload/category');
        }

        $category->save();

        \Notify::success('تم اضافة قسم جديد بنجاح', ' اضافة  القسم   ');
        return redirect()->back();
    }  

}
