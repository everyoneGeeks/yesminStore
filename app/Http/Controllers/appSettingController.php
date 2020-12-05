<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\appSetting;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| appSettingController
|--------------------------------------------------------------------------
| this will handle all appSetting part (CRUD) 
|
*/
/***
 *                        _____      _   _   _             
 *                       / ____|    | | | | (_)            
 *       __ _ _ __  _ __| (___   ___| |_| |_ _ _ __   __ _ 
 *      / _` | '_ \| '_ \\___ \ / _ \ __| __| | '_ \ / _` |
 *     | (_| | |_) | |_) |___) |  __/ |_| |_| | | | | (_| |
 *      \__,_| .__/| .__/_____/ \___|\__|\__|_|_| |_|\__, |
 *           | |   | |                                __/ |
 *           |_|   |_|                               |___/ 
 */
class appSettingController extends Controller
{
    /**  
    * show  form edit  of  appSetting By id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit(){
        $appSetting=appSetting::where('id',1)->first();
        
        return view('pages.appSetting.edit',compact('appSetting'));
    }    

    /**  
    * save edit  of  appSetting By id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request){


        $Notification=appSetting::where('id',1)->first();
        $Notification->aboutus=$request->aboutus;
        $Notification->aboutus_ar=$request->aboutus_ar;
        $Notification->contactus=$request->contactus;
        $Notification->delivery_returns=$request->delivery_returns;
        $Notification->terms_policy_ar=$request->terms_policy_ar;
        $Notification->contactus_ar=$request->contactus_ar;
        $Notification->delivery_returns_ar=$request->delivery_returns_ar;
        $Notification->delivery_info=$request->delivery_info;
        $Notification->delivery_info_ar=$request->delivery_info_ar;
        $Notification->save();

        \Notify::success('تم تعديل الصفحات    بنجاح', ' تعديل الصفحات ');
        return redirect()->back();
    }  





    /**  
    * show  form edit  of  appSetting By id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEditLinks(){
        $appSetting=appSetting::where('id',1)->first();
        
        return view('pages.appSetting.Links',compact('appSetting'));
    }  
    
    public function main(){
        
        return view('closeStatus2');
    }      


    public function vacaation(){
        
        return view('closeStatus1');
    }      

    /**  
    * save edit  of  appSetting By id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEditLinks(Request $request){


        $Notification=appSetting::where('id',1)->first();
        $Notification->facebook=$request->facebook;
        $Notification->youTube=$request->youTube;
        $Notification->instagram=$request->instagram;
        $Notification->pinterest=$request->pinterest;
        $Notification->tiktok=$request->tiktok;
        $Notification->snapchat=$request->snapchat;
        $Notification->twitter=$request->twitter;

        $Notification->save();

        \Notify::success('تم  تعديل مواقع التواصل  بنجاح', ' مواقع التواصل تعديل  ');
        return redirect()->back();
    }  








    /**  
    * show  form edit  of  appSetting By id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEditClose(){
        $appSetting=appSetting::where('id',1)->first();
        
        return view('pages.appSetting.Close',compact('appSetting'));
    }    

    /**  
    * save edit  of  appSetting By id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEditClose(Request $request){


        $Notification=appSetting::where('id',1)->first();
        $Notification->Close=$request->Close;
        
        $Notification->CloseType=$request->closetype;
        

        $Notification->save();
        if($Notification->Close =='yes'){
                        \Notify::success('تم  فتح   الموقع     بنجاح', '  تم فتح  الموقع  ');

        }else{
                        \Notify::success('تم  غلق  الموقع     بنجاح', '  تم غلق الموقع  ');

        }

        return redirect()->back();
    }  






  

}
