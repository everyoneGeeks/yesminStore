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
use App\Orders;
use App\orderPrduct;
use App\shipping;
use App\websiteSetting;
use App\Codes;
use Carbon\Carbon;
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
    $carts=cart::where('user_id',\Auth::guard('users')->user()->id)
    ->with('product')
->with('character')
->with('occasion')
->with('party_theme')
->with('size')->get();


    $user=Users::where('id',\Auth::guard('users')->user()->id)->first();
    // redirect to page if status changes [0 to 3]
if(!$carts->isEmpty()){
    if($carts[0]->status == 2 ){
        return redirect('/payment');

    
}else{
    cart::where('user_id',\Auth::guard('users')->user()->id)->update(['status'=>'0']);
    return view('website.cart',compact('carts','user'))->with($this->OrderSummary());

}

}
cart::where('user_id',\Auth::guard('users')->user()->id)->update(['status'=>'0']);
return view('website.cart',compact('carts','user'))->with($this->OrderSummary());
}

/**  
* Order Summary price list
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function OrderSummary(){
        $cart=cart::where('user_id',\Auth::guard('users')->user()->id)->get();
        //if no cart
        if($cart->isEmpty()){

        $subtotal=0;
        $shipping=0;
        $costofShipping=0;
        $daytoDelivery=0;
        $discount=0;
        $taxes=0;
        $allprice=0;

        }else{
        $subtotal=0;
        $shipping=0;
        $costofShipping=0;
        $daytoDelivery=0;
        foreach($cart as $price){
        $totla=$price->price * $price->amount;

        $subtotal+=$totla- ($totla*$price->discount)/100;
     

        if($price->personalize == '1'){
            
            $subtotal=$subtotal+$price->personalize_price;
            
           
           
        }
        if($price->address_id !== null){
            $shipping=$price->address_id;
        }    cart::where('user_id',\Auth::guard('users')->user()->id)->update(['address_id'=>$price->address_id]);

        }
        $taxes=websiteSetting::find(1)->Taxes;
        $cart=cart::where('user_id',\Auth::guard('users')->user()->id)->first();

        if($shipping !==0){
            $address=Address::find($shipping);
            $Shipping=shipping::where('city_id',$address->city_id)->first();
            $costofShipping=$Shipping->cost;
            $daytoDelivery=$Shipping->day;
            

        }
        if($cart->order_discount !==null ){

        
        $beforDiscount=$subtotal;
        $allprice=$beforDiscount -($beforDiscount * $price->order_discount/100 );
        $discount=($beforDiscount * $price->order_discount/100 );
        $allprice+=$taxes+$costofShipping;

        }else{
        $allprice=$subtotal+$taxes+$costofShipping;
        $discount=0;
        }

        }
        return ['subtotal'=>$subtotal,'allprice'=>$allprice,'taxes'=>$taxes,'discount'=>$discount,'shipping'=>$costofShipping,'day'=>$daytoDelivery];
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
    $personalize=websiteSetting::find(1)->personalize;

    foreach($request->id as $key=>$id){
        $cart=cart::where('id',$id)->update(['personalize'=>0]);
        $cart=cart::where('id',$id)->first();

    $request->child_name[$key]	  == null ? : $cart->child_name	=$request->child_name[$key];
    $request->child_age[$key]  == null ? :$cart->child_age=$request->child_age[$key];
    $cart->save();
    }
    if($request->personalize){
        foreach($request->personalize as $id){
            $cart=cart::where('id',$id)->update(['personalize'=>1,'personalize_price'=>$personalize]);

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
    $product=product::where('id',$id)->with('size')->with('character')->with('occasion')->with('party_theme')->first();

    $cart=new cart();
    $cart->user_id=\Auth::guard('users')->user()->id;
    $cart->product_id=$id;
    $cart->character_id=$request->character_id == null ?  $product->character->first() == null ? null :$product->character->first()->id:$request->character_id  ;
    $cart->occasion_id=$request->occasion_id == null ?  $product->occasion->first()== null ? null :$product->occasion->first()->id:$request->occasion_id  ;
    $cart->party_theme_id=$request->party_theme_id == null ?  $product->party_theme->first() == null ? null : $product->party_theme->first()->id:$request->party_theme_id  ;
    $cart->size_id=$request->size_id == null ?  $product->size->first()== null ? null :$product->size->first()->id:$request->size_id  ;
    $cart->amount=$request->amount ==null ? 1:$request->amount;
    $cart->price=$product->price  ;
    $cart->discount=$product->discount;
    $cart->save();
    return back()->with('success',['ar'=>' تم الاضافة الي سلة التسوق','en'=>'The product has been added to the cart']);

    return back();
}


/**  
* add   product to cart fast way 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function addProductCartFast($id){
    $product=product::where('id',$id)->with('size')->with('character')->with('occasion')->with('party_theme')->first();


    $cart=new cart();
    $cart->user_id=\Auth::guard('users')->user()->id;
    $cart->product_id=$id;
    $cart->character_id=$product->character->first() == null ? null :$product->character->first()->id  ;
    $cart->occasion_id=$product->occasion->first()== null ? null :$product->occasion->first()->id;
    $cart->party_theme_id=$product->party_theme->first() == null ? null : $product->party_theme->first()->id;
    $cart->size_id=$product->size->first()== null ? null :$product->size->first()->id;
    $cart->amount=1;
    $cart->price=$product->price  ;
    $cart->discount=$product->discount;
    $cart->save();

    // \App::getLocale() == 'ar' ? 
    //  \Notify::success("ss","")
    //  : \Notify::success("ss"," The product has been added to the cart");
     return back()->with('success',['ar'=>' تم الاضافة الي سلة التسوق','en'=>'The product has been added to the cart']);
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

    return view('website.shipping',\compact('cart','user','Countries','cities','Alladdress'))->with($this->OrderSummary());
}



/**  
* shipping   cities 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function shippingCities($id){
   $shipping=shipping::where('country_id',$id)->with('cities')->get();

if($shipping->isEmpty()){
    return response()->json(['code'=>'400',"message" => "now shipping city in this country"]);
  }else{
    return response()->json(['code'=>'200',"data" => $shipping]);

  }

}


/**  
* shipping   Cost 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function shippingCost($id){
    $shipping=shipping::where('city_id',$id)->first();
 
 if($shipping == null){
     return response()->json(['code'=>'400',"message" => "now shipping city in this country"]);
   }else{
     return response()->json(['code'=>'200',"data" => $shipping]);
 
   }
 
 }



/**  
* add Coupon
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function addCoupon(Request $request){
    $cart=cart::where('user_id',\Auth::guard('users')->user()->id)->first();
    if($cart->order_discount !== null){
        \App::getLocale() == 'ar' ?  \Notify::error('         يمكنك اضافة كود خصم واحد   ' , '          تم اضافة كود خصم     '  ): 
             \Notify::error('You can apply only one coupon ','  A discount code has been added
             ');

    }

    $Codes=Codes::where('code',$request->coupon)->where('count','!=',0)->where('end_date','>=',Carbon::now())->first();
 
 if($Codes == null){ 
    \App::getLocale() == 'ar' ?  \Notify::error('     تم استخدام او انتهاء كود الخصم  ' , '     خطاء كود الخصم   '  ):  \Notify::error(' The discount code has been used or expired','  error in discount code   ');
        return back();
}else{
    
    cart::where('user_id',\Auth::guard('users')->user()->id)->update(['order_discount'=>$Codes->discount,'order_code_discount'=>$Codes->code]);   
    \App::getLocale() == 'ar' ?  \Notify::success('    لديك خصم بقيمة      ', '   تم اضافة كود الخصم  '.$Codes->discount)
     :  \Notify::success(' You have a '.$Codes->discount.'% discount.','  discount code    ');
     $Codes=Codes::where('code',$request->coupon)->update(['count'=> \DB::raw('count-1')]);

    return back();

   }
 
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
    return back()->with($this->OrderSummary());
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

    return view('website.payment',\compact('cart','user','Countries','cities'))->with($this->OrderSummary());
}


/**  
* add Order from cart 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function AddOrderCart(Request $request){
 $cart=cart::where('user_id',\Auth::guard('users')->user()->id)->with('address')->first();
 if($cart == null){
     return \redirect()->to('/cart');
 }
 $shipping=shipping::where('city_id',$cart->address->city_id)->first();
  $orderPrduct=new Orders();
  $orderPrduct->order_id=rand(100,100000);
  $orderPrduct->user_id=\Auth::guard('users')->user()->id;
  $orderPrduct->shipping_id=$shipping->id;
  $orderPrduct->status="new";
  $orderPrduct->discount=$cart->order_discount;
  $orderPrduct->discount_code=$cart->order_code_discount;
  $orderPrduct->save();

  // order id
  $orderId=$orderPrduct->id;
  $cart=cart::where('user_id',\Auth::guard('users')->user()->id)->with('address')->get();
  if($cart->first()->personalize == 1 ){
  $personalize=websiteSetting::find(1)->personalize;
}else{
   $personalize=0; 
}
  $taxes=websiteSetting::find(1)->Taxes;

  $price=0;
  $discount=0;
  foreach($cart as $productInfo){
  $product=new orderPrduct();
  $product->order_id=$orderPrduct->id;
  $product->product_id=$productInfo->product_id;
  $product->character_id=$productInfo->character_id;
  $product->occasion_id=$productInfo->occasion_id;
  $product->party_theme_id=$productInfo->party_theme_id;
  $product->size_id=$productInfo->size_id;
  $product->address_id=$productInfo->address_id;
  $product->amount=$productInfo->amount;
  $product->price=$productInfo->price;
  $product->discount=$productInfo->discount;
  $product->personalize=$personalize;
  $product->child_name=$productInfo->child_name;
  $product->child_age=$productInfo->child_age;
  $product->save();
  
 $beforediscount=$product->price * $product->amount;
 $afterdiscount =$beforediscount-($beforediscount*$product->discount/100);
 $price+=$afterdiscount+$product->personalize;

 $discount=$product->discount;
  }


  if($orderPrduct->discount){
    $total=$price-($price*$orderPrduct->discount/100);
  }else{
    $total=$price;

  }

  $priceOrder=$total+$shipping->cost+$taxes;

 $orderPrduct=Orders::where('id',$orderPrduct->id)->update(['price'=>$priceOrder]);

 $cart=cart::where('user_id',\Auth::guard('users')->user()->id)->where('status','2')->delete();

  

return redirect('/order/cart/'.$orderId)->with(['subtotal'=>$price,'allprice'=>$priceOrder,'taxes'=>$taxes,'discount'=>$discount,'shipping'=>$shipping,'day'=>0]);
}



/**  
* Payment   cart 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function orderCart($id){
    cart::where('user_id',\Auth::guard('users')->user()->id)->update(['status'=>'3']);
  $orderPrduct=orderPrduct::where('order_id',$id)->get();
  $orders=Orders::where('id',$id)->first();



    return view('website.orderTracking',\compact('cart','user','Countries','cities','orders','orderPrduct'));
}



}
