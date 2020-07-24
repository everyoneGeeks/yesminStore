<?php

namespace App\Http\Controllers;
use App\occasion;
use Carbon\Carbon;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| occasionControler
|--------------------------------------------------------------------------
| this will handle all occasion part (CRUD) 
|
*/
/**
                         _             
                        (_)            
  ___   ___ ___ __ _ ___ _  ___  _ __  
 / _ \ / __/ __/ _` / __| |/ _ \| '_ \ 
| (_) | (_| (_| (_| \__ \ | (_) | | | |
 \___/ \___\___\__,_|___/_|\___/|_| |_|
                                       

 */
class occasionControler extends Controller
{
/**  
* show list of occasion
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $occasions= occasion::get();
    return view('pages.occasion.list',compact('occasions'));
    }
    /**  
    * show info of  occasion By id
    * @pararm int $id occasion id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $occasion= occasion::where('id',$id)->first();
        return view('pages.occasion.info',compact('occasion'));
    }
    

    /**  
    * show  form edit  of  occasion By id 
    * @pararm int $id occasion id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $occasion= occasion::where('id',$id)->first();
        return view('pages.occasion.edit',compact('occasion'));
    }    

    /**  
    * save edit  of  occasion By id 
    * @pararm int $id occasion id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){

        $rules=['name_ar'=>'required|max:255','name_en'=>'required|max:255'];

$message=
['name_ar.required'=>'يجب ادخال اسم  الحفل  ',
'name_en.required'=>'يجب ادخال اسم  الحفل ',
"name_ar.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
"name_en.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
];   
  
        $request->validate($rules,$message);

        $occasion= occasion::where('id',$id)->first();
        $occasion->name_ar=$request->name_ar;
        $occasion->name_en=$request->name_en;
        $occasion->created_at=Carbon::now();
        $occasion->save();

        \Notify::success('تم تعديل بيانات نوع الحفل  بنجاح', ' تعديل بيانات نوع الحفل    ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  occasion 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(){
        return view('pages.occasion.add');
    }    

    /**  
    * save add  of  occasion 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request){

    $rules=['name_ar'=>'required|max:255','name_en'=>'required|max:255'];
  
  
      $message=[
    'name_ar.required'=>'يجب ادخال اسم  الحفل  ',
    'name_en.required'=>'يجب ادخال اسم  الحفل ',
    "name_ar.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
    "name_en.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
    ];
  
  
        $request->validate($rules,$message);
        $occasion=new occasion;
        $occasion->name_ar=$request->name_ar;
        $occasion->name_en=$request->name_en;
        $occasion->created_at=Carbon::now();
        $occasion->save();

        \Notify::success('تم اضافة نوع الحفل  جديد بنجاح', ' اضافة  نوع الحفل    ');
        return redirect()->back();
    }  

    /**  
    * delete  form     occasion 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function delete($id){
        $occasion=occasion::where('id',$id)->delete();
        \Notify::success('تم حذف نوع الحفل   بنجاح', ' حذف  نوع الحفل    ');
        return redirect()->back();
    }
}
