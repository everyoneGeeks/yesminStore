<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders;
use App\orderProduct;
use App\Users;
use App\rateProduct;
use App\Complains;
/*
|--------------------------------------------------------------------------
| OrderController
|--------------------------------------------------------------------------
| this will handle show , rate   order (RD)
|
*/

/*
  ____          _           
 / __ \        | |          
| |  | |_ __ __| | ___ _ __ 
| |  | | '__/ _` |/ _ \ '__|
| |__| | | | (_| |  __/ |   
 \____/|_|  \__,_|\___|_|   
                            
*/


class OrderController extends Controller
{
/**  
* show all orders    
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function orders(){
    $orders=Orders::where('user_id',\Auth::guard('users')->user()->id)->with('orderProduct.rateProduct')->get();
    $user=Users::where('id',\Auth::guard('users')->user()->id)->first();

  
      return view('website.orders',\compact('orders','user'));
  }


/**  
* rate product  
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function productRate(Request $request,$id){

 
  $rateProduct=rateProduct::where('user_id',\Auth::guard('users')->user()->id)->where('product_id',$id)->first();
if($rateProduct){
  //update
  $rateProduct->rate=$request->rate;
  $rateProduct->comment=$request->comment;
  $rateProduct->save();

  return back();
}

        $rateProduct=new rateProduct();
        $rateProduct->user_id=\Auth::guard('users')->user()->id;
        $rateProduct->product_id=$id;
        $rateProduct->comment=$request->comment;
        $rateProduct->rate=$request->rate;
        $rateProduct->save();
    
  

      return back();
  }


  public function productRateUdpate(Request $request,$id){

        //edit rate 
        $rateProduct=rateProduct::where('user_id',\Auth::guard('users')->user()->id)->where('id',$id)->first();

            $rateProduct->rate=$request->rateing;
            $rateProduct->comment=$request->comment;
            $rateProduct->save();
    
            return back();

}

public function productComplaint(Request $request,$order,$product){

$Complains=Complains::where('user_id',\Auth::guard('users')->user()->id)->where('order_id',$order)->where('product_id',$product)->first();

if($Complains){
  $Complains->title=$request->title;
  $Complains->subject=$request->subject;
  $Complains->save();
  return back();
}

$Complains=new Complains();
$Complains->user_id=\Auth::guard('users')->user()->id;
$Complains->order_id=$order;
$Complains->product_id=$product;
$Complains->title=$request->title;
$Complains->subject=$request->subject;
$Complains->save();

return back();


}

}