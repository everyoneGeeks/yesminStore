<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ads;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Advertisements
|--------------------------------------------------------------------------
| this will handle all Advertisements part (CRUD) 
|
*/
/**
             _                _   _                               _       
    /\      | |              | | (_)                             | |      
   /  \   __| |_   _____ _ __| |_ _ ___  ___ _ __ ___   ___ _ __ | |_ ___ 
  / /\ \ / _` \ \ / / _ \ '__| __| / __|/ _ \ '_ ` _ \ / _ \ '_ \| __/ __|
 / ____ \ (_| |\ V /  __/ |  | |_| \__ \  __/ | | | | |  __/ | | | |_\__ \
/_/    \_\__,_| \_/ \___|_|   \__|_|___/\___|_| |_| |_|\___|_| |_|\__|___/
                                                                          
                                                                          
 */
class Advertisements extends Controller
{
/**  
* show list of ads
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $ads=Ads::get();
    return view('pages.ads.list',compact('ads'));
    }
    /**  
    * change status of ads (active / deactive)
    * @pararm int $id ad id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function status($id){
        $ad=Ads::where('id',$id)->first();
    
        if($ad->is_active == 0){
            $ad->is_active = 1;
            $ad->save();
            \Notify::success('تم تفعيل  الاعلان بنجاح', 'تغير حالة  الاعلان  ');
        }else{
            $ad->is_active = 0;
            $ad->save();
            \Notify::success('تم الغاء تفعيل  الاعلان بنجاح', 'تغير حالة الاعلان ');
        }
    
        return redirect()->back();
    }

    /**  
    * show  form edit  of  ad By id 
    * @pararm int $id ad id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $ad=Ads::where('id',$id)->first();
        return view('pages.ads.edit',compact('ad'));
    }    

    /**  
    * save edit  of  ad By id 
    * @pararm int $id ad id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){

            $rules=[
                "start_from"=>'date',
                "lang"=>'in:ar,en',
                'end_at'=>'date',
        ];
        $message=[    
        'end_at.date'=>'يجب ادخال  التاريخ  ',
        'start_from.date'=>'يجب ادخال  التاريخ ',
        'lang.in'=>'   يجب ان تكون اللغه المدخلة مابين  ar او en  ',];
        $request->validate($rules,$message);

        $ad=Ads::where('id',$id)->first();
        $ad->end_at=$request->end_at;
        $ad->start_from=$request->start_from;
        $ad->lang=$request->lang;

        if($request->hasFile('image')){
            $this->SaveFile($ad,'image','image','upload/ads');
        }

        $ad->created_at=Carbon::now();
        $ad->save();

        \Notify::success('تم تعديل بيانات  الاعلان بنجاح', ' تعديل بيانات  الاعلان   ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  ad 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(){
        return view('pages.ads.add');
    }    

    /**  
    * save add  of  ad 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request){
        $rules=[
            'image'=>'required',
            "start_from"=>'required|date',
            "lang"=>'required|in:ar,en',
            'end_at'=>'required|date',
        ];
        $message=[
        'image.required'=>'يجب ادخال  الصورة ',
        'end_at.required'=>'يجب ادخال  التاريخ انتهاء الاعلان',
        'start_from.required'=>'يجب ادخال  التاريخ البداء الاعلان',
        'lang.required'=>'يجب ادخال  اللغة  ',
        'lang.in'=>'   يجب ان تكون اللغه المدخلة مابين  ar او en  ',

        
        ];
        $request->validate($rules,$message);



        $ad=new Ads;
        $ad->end_at=$request->end_at;
        $ad->start_from=$request->start_from;
        $ad->lang=$request->lang;

        if($request->hasFile('image')){
            $this->SaveFile($ad,'image','image','upload/ads');
        }
        $ad->created_at=Carbon::now();
        $ad->save();
        
        \Notify::success('تم اضافة بيانات الاعلان بنجاح', 'اضافة بيانات  الاعلان');

        return redirect()->back();
    } 
}
