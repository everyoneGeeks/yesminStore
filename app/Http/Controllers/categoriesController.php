<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| categoriesController
|--------------------------------------------------------------------------
| this will handle all category part (CRUD) 
|
*/
/**
            _                              
           | |                             
   ___ __ _| |_ ___  __ _  ___  _ __ _   _ 
  / __/ _` | __/ _ \/ _` |/ _ \| '__| | | |
 | (_| (_| | ||  __/ (_| | (_) | |  | |_| |
  \___\__,_|\__\___|\__, |\___/|_|   \__, |
                     __/ |            __/ |
                    |___/            |___/ 
 */
class categoriesController extends Controller
{
/**  
* show list of category
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $categories=category::get();
    return view('pages.categories.list',compact('categories'));
    }
    /**  
    * show info of  category By id
    * @pararm int $id category id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $category=category::where('id',$id)->first();
        return view('pages.categories.info',compact('category'));
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

        $rules=['name_ar'=>'required|max:255','name_en'=>'required|max:255'];

$message=
['name_ar.required'=>'يجب ادخال اسم القسم ',
'name_en.required'=>'يجب ادخال اسم القسم',
"name_ar.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
"name_en.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
];   
  
        $request->validate($rules,$message);

        $category=category::where('id',$id)->first();
        $category->name_ar=$request->name_ar;
        $category->name_en=$request->name_en;
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

    $rules=['name_ar'=>'required|max:255','name_en'=>'required|max:255'];
  
  
      $message=[
    'name_ar.required'=>'يجب ادخال اسم القسم ',
    'name_en.required'=>'يجب ادخال اسم القسم',
    "name_ar.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
"name_en.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
    ];
  
  
$request->validate($rules,$message);
        $category=new category;
        $category->name_ar=$request->name_ar;
        $category->name_en=$request->name_en;
        $category->created_at=Carbon::now();
        $category->save();

        \Notify::success('تم اضافة قسم جديد بنجاح', ' اضافة  القسم   ');
        return redirect()->back();
    }  

    
}
