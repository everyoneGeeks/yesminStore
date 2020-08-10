<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\orderProduct;
use App\Users;
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
    $orderProduct=Order::where('user_id',\Auth::guard('users')->user()->id)->with('orderProduct')->get();
  
  
      return view('website.orders',\compact('orderProduct'));
  }


/**  
* rate product  
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function productRate($id){

    
    //edit rate 
    $rateProduct=rateProduct::where('user_id',\Auth::guard('users')->user()->id)->where('product_id',$id)->first();

    if($rateProduct){
        $rateProduct->rate=$request->rate;
        $rateProduct->comment=$request->comment;
        $rateProduct->save();
    }else{
        $rateProduct=new rateProduct();
        $rateProduct->user_id=\Auth::guard('users')->user()->id;
        $rateProduct->product_id=$id;
        $rateProduct->comment=$request->comment;
        $rateProduct->rate=$request->rate;
        $rateProduct->save();
    }
  

      return back();
  }

}
