<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\cart;
use App\Users;
use App\product;
use App\country;
use App\city;
use App\Address;
use App\Order;
use App\orderProduct;

/*
|--------------------------------------------------------------------------
| CartController
|--------------------------------------------------------------------------
| this will handle add , delete , show   user cart (CRD)
|
*/
/**
                _   
               | |  
  ___ __ _ _ __| |_ 
 / __/ _` | '__| __|
| (_| (_| | |  | |_ 
 \___\__,_|_|   \__|
                                       
 */
class CartController extends Controller
{
/**  
* show all  product in cart  for user By id
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function cart(){
cart::where('user_id',\Auth::guard('users')->user()->id)->update(['status'=>'0']);
    $carts=cart::where('user_id',\Auth::guard('users')->user()->id)
    ->with('product')
->with('character')
->with('occasion')
->with('party_theme')
->with('size')->get();

    $user=Users::where('id',\Auth::guard('users')->user()->id)->first();
    return view('website.cart',compact('carts','user'));
}


/**  
* update product cart
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function updateProductcart(Request $request,$id){

    $cart=cart::where('id',$id)->first();
    $request->character_id  == null ? :$cart->character_id=$request->character_id;
    $request->occasion_id  == null ? : $cart->occasion_id=$request->occasion_id;
    $request->party_theme_id  == null ? :$cart->party_theme_id=$request->party_theme_id;
    $request->size_id  == null ? :$cart->size_id=$request->size_id;
    $request->amount  == null ? :$cart->amount=$request->amount;
    $cart->save();
    return back();
}




/**  
* add Personalize
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function addPersonalize(Request $request){
    foreach($request->id as $key=>$id){
        $cart=cart::where('id',$id)->update(['personalize'=>0]);
        $cart=cart::where('id',$id)->first();

    $request->child_name[$key]	  == null ? : $cart->child_name	=$request->child_name[$key];
    $request->child_age[$key]  == null ? :$cart->child_age=$request->child_age[$key];
    $cart->save();
    }
    if($request->personalize){
        foreach($request->personalize as $id){
            $cart=cart::where('id',$id)->update(['personalize'=>1]);

        }

    }
    return back();
}





/**  
* add   product to cart 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function addCart(Request $request,$id){
    $product=product::where('id',$id)->first();
    $cart=new cart();
    $cart->user_id=\Auth::guard('users')->user()->id;
    $cart->product_id=$id;
    $cart->character_id=$request->character_id;
    $cart->occasion_id=$request->occasion_id;
    $cart->party_theme_id=$request->party_theme_id;
    $cart->size_id=$request->size_id;
    $cart->amount=$request->amount;
    $cart->price=$product->price;
    $cart->discount=$product->discount;
    $cart->save();
    return back();
}


/**  
* update  cart 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function updateCart(){
    $cart=cart::where('id',$id)->first();
    $cart->character_id=$request->character_id;
    $cart->occasion_id=$request->occasion_id;
    $cart->party_theme_id=$request->party_theme_id;
    $cart->size_id=$request->size_id;
    $cart->amount=$request->amount;
    $cart->price=$request->price;
    $cart->discount=$request->discount;
    $cart->personalize=$request->personalize;
    $cart->address_id=$request->address_id;
    $cart->save();
    return back();
}


/**  
* delete  cart 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function deleteCart($id){
    $cart=cart::where('id',$id)->delete();
    return back();
}




/**  
* shipping   cart 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function shippingCart(){
    cart::where('user_id',\Auth::guard('users')->user()->id)->update(['status'=>'1']);
    $cart=cart::where('user_id',\Auth::guard('users')->user()->id)->with('address')->first();
    $Alladdress=Address::where('user_id',\Auth::guard('users')->user()->id)->get();
    $user=Users::where('id',\Auth::guard('users')->user()->id)->with('address')->first();
    $Countries=country::all();

    $cities=city::with('country')->get();

    return view('website.shipping',\compact('cart','user','Countries','cities','Alladdress'));
}


/**  
* add new address to user cart
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function addAddressCart(Request $request){
    
    $rules=[
        'address_name'=>'required|unique:addresses,address_name|max:255',
        'first_name'=>'required|max:255',
        'last_name'=>'required|max:255',
        'country'=>'required|exists:country,id|max:255',
        'city'=>'required|exists:city,id|max:255',
        'street_name'=>'required|max:255',
        'building_name'=>'required|max:255',
        'floor'=>'required',
        'apartment'=>'required',
        'nearest'=>'required',
        'location'=>'required',
           ];

           $validator = \Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
      
    $Address=new Address();
    $Address->user_id=\Auth::guard('users')->user()->id;
    $Address->first_name=$request->first_name;
    $Address->last_name=$request->last_name;
    $Address->country_id=$request->country;
    $Address->city_id=$request->city;
    $Address->street_name=$request->street_name;
    $Address->building_name=$request->building_name;
    $Address->floor=$request->floor;
    $Address->apartment=$request->apartment;
    $Address->nearest=$request->nearest;
    $Address->location=$request->location;
    $Address->phone_number=$request->phone_number;
    $Address->additional_phone_number=$request->additional_phone_number;
    $Address->landLine=$request->landLine;
    $Address->shipping_note=$request->shipping_note;
    $Address->address_name=$request->address_name;
    $Address->save();

    cart::where('user_id',\Auth::guard('users')->user()->id)->update(['address_id'=>$Address->id]);
    return back();
}


/**  
* add new address to cart
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function AddressCart(Request $request){
    
   if($request->address){
    cart::where('user_id',\Auth::guard('users')->user()->id)->update(['address_id'=>$request->address]);   
   }else{
        $this->addAddressCart($request);
   }
    return redirect('/payment');
}



/**  
* Payment   cart 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function paymentCart(){
    cart::where('user_id',\Auth::guard('users')->user()->id)->update(['status'=>'2']);
    $cart=cart::where('user_id',\Auth::guard('users')->user()->id)->with('address')->first();
    $user=Users::where('id',\Auth::guard('users')->user()->id)->with('address')->first();
    $Countries=country::all();

    $cities=city::with('country')->get();

    return view('website.payment',\compact('cart','user','Countries','cities'));
}


/**  
* add Order from cart 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function AddOrderCart(){
 $cart=cart::where('user_id',\Auth::guard('users')->user()->id)->with('address')->first();

  $orderProduct=new Order();
  $orderProduct->order_id=rand(100,100000);
  $orderProduct->user_id=\Auth::guard('users')->user()->id;
  $orderProduct->shipping_id=$cart->address_id;
  $orderProduct->status="new";
  $orderProduct->discount=$request->discount;
  $orderProduct->price=$request->price;
  $orderProduct->save();

  $cart=cart::where('user_id',\Auth::guard('users')->user()->id)->with('address')->get();

  foreach($cart as $productInfo){
  $product=new orderPrduct();
  $product->order_id=$orderProduct->id;
  $product->product_id=$productInfo->product_id;
  $product->character_id=$productInfo->character_id;
  $product->occasion_id=$productInfo->occasion_id;
  $product->party_theme_id=$productInfo->party_theme_id;
  $product->size_id=$productInfo->size_id;
  $product->address_id=$productInfo->address_id;
  $product->amount=$productInfo->amount;
  $product->price=$productInfo->price;
  $product->discount=$productInfo->discount;
  $product->personalize=$productInfo->personalize;
  $product->child_name=$productInfo->child_name;
  $product->child_age=$productInfo->child_age;
  $product->save();

  }
  $cart=cart::where('user_id',\Auth::guard('users')->user()->id)->where('status',2)->delete();

return redirect('/cart/order');
}



/**  
* Payment   cart 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function orderCart(){
    cart::where('user_id',\Auth::guard('users')->user()->id)->update(['status'=>'3']);
  $orderProduct=Order::where('user_id',\Auth::guard('users')->user()->id)->with('orderProduct')->get();


    return view('website.orderTracking',\compact('cart','user','Countries','cities'));
}



}
