<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders;
use App\orderPrduct;
use App\Users;
use App\rateProduct;
use App\returnOrder;
use App\Complains;
use App\products;
use App\Carbon;
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
  $rateProduct->rate=$request->rateing;
  $rateProduct->comment=$request->comment;
  $rateProduct->save();

  return back();
}

        $rateProduct=new rateProduct();
        $rateProduct->user_id=\Auth::guard('users')->user()->id;
        $rateProduct->product_id=$id;
        $rateProduct->comment=$request->comment;
        $rateProduct->rate=$request->rateing;
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
  $Complains->phone=$request->phone;
  $Complains->subject=$request->subject;
  $Complains->save();
  return back();
}

$Complains=new Complains();
$Complains->user_id=\Auth::guard('users')->user()->id;
$Complains->order_id=$order;
$Complains->product_id=$product;
$Complains->phone=$request->phone;
$Complains->subject=$request->subject;
$Complains->save();


$product=orderPrduct::where('order_id',$order)->where('product_id',$product)->first();
$product->is_complains="1";
$product->phone=$request->phone;
$product->subject=$request->subject;
$product->save();


return back();


}



public function productReturning(Request $request,$order,$product){

  $Returning=returnOrder::where('user_id',\Auth::guard('users')->user()->id)->where('order_id',$order)->where('product_id',$product)->first();
  
  if($Returning){
    $Returning->phone=$request->phone;
    $Returning->subject=$request->subject;
    $Returning->save();
    return back();
  }
  
  $Returning=new returnOrder();
  $Returning->user_id=\Auth::guard('users')->user()->id;
  $Returning->order_id=$order;
  $Returning->product_id=$product;
  $Returning->phone=$request->phone;
  $Returning->subject=$request->subject;
  $Returning->save();
  
  
  $product=orderPrduct::where('order_id',$order)->where('product_id',$product)->first();
  $product->is_returning="1";
  $product->phone=$request->phone;
  $product->subject=$request->subject;
  $product->save();
  
  
  return back();
  
  
  }
}