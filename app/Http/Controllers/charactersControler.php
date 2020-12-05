<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\characters;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| charactersControler
|--------------------------------------------------------------------------
| this will handle all characters part (CRUD)
|
*/
/*
      _                          _                
     | |                        | |
  ___| |__   __ _ _ __ __ _  ___| |_ ___ _ __ ___
 / __| '_ \ / _` | '__/ _` |/ __| __/ _ \ '__/ __|
| (__| | | | (_| | | | (_| | (__| ||  __/ |  \__ \
 \___|_| |_|\__,_|_|  \__,_|\___|\__\___|_|  |___/


 */
class charactersControler extends Controller
{
/**
* show list of characters
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $characters= characters::get();
    return view('pages.characters.list',compact('characters'));
    }
    /**
    * show info of  characters By id
    * @pararm int $id characters id
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $characters= characters::where('id',$id)->first();
        return view('pages.characters.info',compact('characters'));
    }


    /**
    * show  form edit  of  characters By id
    * @pararm int $id characters id
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $characters= characters::where('id',$id)->first();
        return view('pages.characters.edit',compact('characters'));
    }

    /**
    * save edit  of  characters By id
    * @pararm int $id characters id
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

        $characters= characters::where('id',$id)->first();
        $characters->name_ar=$request->name_ar;
        $characters->name_en=$request->name_en;
        $characters->created_at=Carbon::now();
        $characters->save();

        \Notify::success('تم تعديل بيانات نوع الحفل  بنجاح', ' تعديل بيانات نوع الحفل    ');
        return redirect()->back();
    }


    /**
    * show  form add  of  characters
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(){
        return view('pages.characters.add');
    }

    /**
    * save add  of  characters
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
        $characters=new characters;
        $characters->name_ar=$request->name_ar;
        $characters->name_en=$request->name_en;
        $characters->created_at=Carbon::now();
        $characters->save();

        \Notify::success('تم اضافة نوع الحفل  جديد بنجاح', ' اضافة  نوع الحفل    ');
        return redirect()->back();
    }

    /**
    * delete  form     characters
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function delete($id){
        $characters=characters::where('id',$id)->delete();
        \Notify::success('تم حذف نوع الحفل   بنجاح', ' حذف  نوع الحفل    ');
        return redirect()->back();
    }
}
