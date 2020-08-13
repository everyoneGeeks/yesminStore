<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\wishList;
use App\Users;
use App\product;
/*
|--------------------------------------------------------------------------
| wishListController
|--------------------------------------------------------------------------
| this will handle add , delete , show   user wishList (CRD)
|
*/
/**
          _     _     _      _     _   
         (_)   | |   | |    (_)   | |  
__      ___ ___| |__ | |     _ ___| |_ 
\ \ /\ / / / __| '_ \| |    | / __| __|
 \ V  V /| \__ \ | | | |____| \__ \ |_ 
  \_/\_/ |_|___/_| |_|______|_|___/\__|
                                       

                     
 */
class wishListController extends Controller
{
/**  
* show all wishList  for  user By id
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function wishList(){
    $wishLists=wishList::where('user_id',\Auth::guard('users')->user()->id)->with('product')->paginate(4);
    $user=Users::where('id',\Auth::guard('users')->user()->id)->first();
    return view('website.wishList',compact('wishLists','user'));
}


/**  
* add  product to  wishList 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function addWishList($id){

    $product=product::where('id',$id)->first();

    $checkList=wishList::where('product_id',$id)->where('user_id',\Auth::guard('users')->user()->id)->first();
    if($checkList){
        $checkList->delete();
    }else{

 
    $wishList=new wishList();
    $wishList->user_id=\Auth::guard('users')->user()->id;
    $wishList->product_id=$id;
    $wishList->price=$product->price;
    $wishList->discount=$product->discount;
    $wishList->save();
}
    return back();
}


/**  
* delete  product from  wishList  
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function deleteWishList($id){
    $wishList=wishList::where('product_id',$id)->where('user_id',\Auth::guard('users')->user()->id)->delete();
    return back();
}

}
