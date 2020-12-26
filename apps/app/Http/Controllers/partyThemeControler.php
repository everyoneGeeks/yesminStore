<?php

namespace App\Http\Controllers;
use App\Party_Theme;
use Carbon\Carbon;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| partyThemeControler
|--------------------------------------------------------------------------
| this will handle all partyTheme part (CRUD) 
|
*/
/**
 
 _____           _      _______ _                         
|  __ \         | |    |__   __| |                        
| |__) |_ _ _ __| |_ _   _| |  | |__   ___ _ __ ___   ___ 
|  ___/ _` | '__| __| | | | |  | '_ \ / _ \ '_ ` _ \ / _ \
| |  | (_| | |  | |_| |_| | |  | | | |  __/ | | | | |  __/
|_|   \__,_|_|   \__|\__, |_|  |_| |_|\___|_| |_| |_|\___|
                      __/ |                               
                     |___/    
 */
class partyThemeControler extends Controller
{
/**  
* show list of partyTheme
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $PartyThemes= Party_Theme::get();
    return view('pages.Party_Themes.list',compact('PartyThemes'));
    }
    /**  
    * show info of  partyTheme By id
    * @pararm int $id partyTheme id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $PartyTheme= Party_Theme::where('id',$id)->first();
        return view('pages.Party_Themes.info',compact('PartyTheme'));
    }
    

    /**  
    * show  form edit  of  partyTheme By id 
    * @pararm int $id partyTheme id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $PartyTheme= Party_Theme::where('id',$id)->first();
        return view('pages.Party_Themes.edit',compact('PartyTheme'));
    }    

    /**  
    * save edit  of  partyTheme By id 
    * @pararm int $id partyTheme id 
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

        $PartyTheme= Party_Theme::where('id',$id)->first();
        $PartyTheme->name_ar=$request->name_ar;
        $PartyTheme->name_en=$request->name_en;
        $PartyTheme->created_at=Carbon::now();
        $PartyTheme->save();

        \Notify::success('تم تعديل بيانات نوع الحفل  بنجاح', ' تعديل بيانات نوع الحفل    ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  partyTheme 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(){
        return view('pages.Party_Themes.add');
    }    

    /**  
    * save add  of  partyTheme 
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
        $PartyTheme=new Party_Theme;
        $PartyTheme->name_ar=$request->name_ar;
        $PartyTheme->name_en=$request->name_en;
        $PartyTheme->created_at=Carbon::now();
        $PartyTheme->save();

        \Notify::success('تم اضافة نوع الحفل  جديد بنجاح', ' اضافة  نوع الحفل    ');
        return redirect()->back();
    }  

    /**  
    * delete  form     partyTheme 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function delete($id){
        $PartyTheme=Party_Theme::where('id',$id)->delete();
        \Notify::success('تم حذف نوع الحفل   بنجاح', ' حذف  نوع الحفل    ');
        return redirect()->back();
    }        
}
