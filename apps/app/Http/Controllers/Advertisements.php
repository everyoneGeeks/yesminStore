<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ads;
use App\costomerPhoto;
use App\costomerRate;
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
    $costomerPhotos=costomerPhoto::get();
    $costomerRates=costomerRate::get();
    return view('pages.ads.list',compact('ads','costomerPhotos','costomerRates'));
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

                "lang"=>'in:ar,en',

        ];
        $message=[ 
        'lang.in'=>'   يجب ان تكون اللغه المدخلة مابين  ar او en  ',];
        $request->validate($rules,$message);

        $ad=Ads::where('id',$id)->first();

        $ad->lang=$request->lang;

        if($request->hasFile('image')){
            $this->SaveFile($ad,'image','image','upload/ads');
        }

        $ad->created_at=Carbon::now();
        $ad->save();

        \Notify::success('تم تعديل بيانات  1 بنجاح', ' تعديل بيانات  1   ');
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
            "lang"=>'required|in:ar,en',
   
        ];
        $message=[
        'image.required'=>'يجب ادخال  الصورة ',
        'lang.required'=>'يجب ادخال  اللغة  ',
        'lang.in'=>'   يجب ان تكون اللغه المدخلة مابين  ar او en  ',

        
        ];
        $request->validate($rules,$message);



        $ad=new Ads;
        $ad->lang=$request->lang;

        if($request->hasFile('image')){
            $this->SaveFile($ad,'image','image','upload/ads');
        }
        $ad->created_at=Carbon::now();
        $ad->save();
        
        \Notify::success('تم اضافة بيانات 1 بنجاح', 'اضافة بيانات  1');

        return redirect()->back();
    } 
    
    
   /**  
    * delete add by id
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    
    public function delete($id){
        $Ads=Ads::where('id',$id)->delete();
                
        \Notify::success('تم حذف   بنجاح', 'حذف بيانات  ');

        return redirect()->back();
    }
    
}
