<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BalanceRecharge;
use Carbon\Carbon;
use App\Users;
use App\Providers;
use App\Notifications;

/*
|--------------------------------------------------------------------------
| balanceRechargingControllers
|--------------------------------------------------------------------------
| this will handle all balance part (CRUD) 
|
*/
/***
 *      _           _                      
 *     | |         | |                     
 *     | |__   __ _| | __ _ _ __   ___ ___ 
 *     | '_ \ / _` | |/ _` | '_ \ / __/ _ \
 *     | |_) | (_| | | (_| | | | | (_|  __/
 *     |_.__/ \__,_|_|\__,_|_| |_|\___\___|
 *                                         
 *                                         
 */
class balanceRechargingControllers extends Controller
{
/**  
* show list of balance Recharging
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $BalanceRecharge=BalanceRecharge::with('user')->with('provider')->get();

    return view('pages.BalanceRecharging.list',compact('BalanceRecharge'));
    }
    /**  
    * show info of  balance Recharging By id
    * @pararm int $id balance Recharging id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $BalanceRecharge=BalanceRecharge::where('id',$id)->with('user')->with('provider')->first();
        return view('pages.BalanceRecharging.info',compact('BalanceRecharge'));
    }
    /**  
    * change status of balance Recharging (approve)
    * @pararm int $id balance Recharging id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function approve(Request $request,$id){
        $BalanceRecharge=BalanceRecharge::where('id',$id)->with('user')->with('provider')->first();
    
            $BalanceRecharge->is_approved =1 ;
            $BalanceRecharge->save();

            if($BalanceRecharge->user !== NULL){
               $user=Users::where('id',$BalanceRecharge->user->id)->first();
               $user->balance+=$request->amount;
               $user->save(); 
              $this->SendFCM($user->firebase_token,$this->GetMessage('4',$user->language));
            }


            if($BalanceRecharge->provider !== NULL){
                $provider=Providers::where('id',$BalanceRecharge->provider->id)->first();
                $provider->balance=$request->amount;
                $provider->save(); 
                $this->SendFCM($provider->firebase_token,$this->GetMessage('4',$provider->language));
             }

            \Notify::success(' تم تغير الحاله الي  موافق', ' تغير الحالة  ');
    
    
        return redirect()->back();
    }




    /**  
    * change status of balance Recharging (disapprove)
    * @pararm int $id balance Recharging id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function disapprove(Request $request,$id){
        $BalanceRecharge=BalanceRecharge::where('id',$id)->with('user')->with('provider')->first();

            $BalanceRecharge->is_approved =0 ;
            $BalanceRecharge->save();



            if($BalanceRecharge->user !== NULL){
                $user=Users::where('id',$BalanceRecharge->user->id)->first();
               $this->SendFCM($user->firebase_token,$this->GetMessage('4',$user->language));
             }
 
 
             if($BalanceRecharge->provider !== NULL){
                 $provider=Providers::where('id',$BalanceRecharge->provider->id)->first();
                 $this->SendFCM($provider->firebase_token,$this->GetMessage('4',$provider->language));
              }
            
            \Notify::success(' تم تغير الحاله الي غير موافق', ' تغير الحالة  ');
    
    
        return redirect()->back();
    }



    /**  
    * cGetMessage 
    * @pararm int $NotificationId 
    * @pararm int $Language 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Mohamed Fathy
    */
    public function GetMessage ($NotificationId, $Language) 
    {
        // return notification or null
        $Notification = Notifications::find($NotificationId);
        switch ($Language) {
            case 'ar': $Message = $Notification->content_ar; break;
            case 'en': $Message = $Notification->content_en; break;
            default:   $Message = $Notification->content_ar; break;
        }
        return $Message;
    }
}
