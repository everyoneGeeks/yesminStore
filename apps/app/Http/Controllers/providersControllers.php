<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers;
use App\beautyCenter;
/*
|--------------------------------------------------------------------------
| providersControllers
|--------------------------------------------------------------------------
| this will handle all provider part (CRUD) 
|
*/
/*
                      (_)   | |              
  _ __  _ __ _____   ___  __| | ___ _ __ ___ 
 | '_ \| '__/ _ \ \ / / |/ _` |/ _ \ '__/ __|
 | |_) | | | (_) \ V /| | (_| |  __/ |  \__ \
 | .__/|_|  \___/ \_/ |_|\__,_|\___|_|  |___/
 | |                                         
 |_|                       
*/
class providersControllers extends Controller
{

/**  
* show list of providers
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
$providers=Providers::get();
return view('pages.providers.list',compact('providers'));
}
/**  
* show info of  Provider By id
* @pararm int $id user id 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function info($id){

    $provider=Providers::where('id',$id)->with(['beautyCenter'=>function($q){
        $q->with('rate')->with('category');
    }])->first();
    return view('pages.providers.info',compact('provider'));
}
/**  
* change status of provider (active / deactive)
* @pararm int $id user id 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function status($id){

    $provider=Providers::where('id',$id)->first();

    if($provider->is_active == 1){

        $provider->is_active = 0;
        $provider->save();

        \Notify::success('تم الغاء تفعيل المندوب بنجاح', 'تغير حالة المندوب ');

    }else{

        $provider->is_active =1;

        $provider->save();
        \Notify::success('تم تفعيل المندوب بنجاح', 'تغير حالة المندوب ');
    }

    return redirect()->back();
}


/**  
* change status of beautyCenter (active / deactive)
* @pararm int $id beautyCenter id 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function statusbeautyCenter($id){

    $beautyCenter=beautyCenter::where('id',$id)->first();

    if($beautyCenter->is_active == 1){

        $beautyCenter->is_active = 0;
        $beautyCenter->save();

        \Notify::success('تم الغاء تفعيل المتجر بنجاح', 'تغير حالة المتجر ');

    }else{

        $beautyCenter->is_active =1;

        $beautyCenter->save();
        \Notify::success('تم تفعيل المتجر بنجاح', 'تغير حالة المتجر ');
    }

    return redirect()->back();
}


}
