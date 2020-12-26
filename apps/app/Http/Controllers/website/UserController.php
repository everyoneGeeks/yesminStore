<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;
use App\Address;
use App\country;
use App\city;
use App\shipping;
use Auth;

/*
|--------------------------------------------------------------------------
| UserController
|--------------------------------------------------------------------------
| this will handle add , edit , update   user part (CRUD)
|
*/
/**
 _    _               
| |  | |              
| |  | |___  ___ _ __ 
| |  | / __|/ _ \ '__|
| |__| \__ \  __/ |   
 \____/|___/\___|_|   
                     
 */
class UserController extends Controller
{
/**  
* show info of  user By id
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function info(){
    $user=Users::where('id',\Auth::guard('users')->user()->id)->first();
    return view('website.userInfo',compact('user'));
}


/**  
* show info of  user By id
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function address(){

    $user=Users::where('id',\Auth::guard('users')->user()->id)->with('address')->first();
    $Countries=country::all();

    $Countries=country::all();

    $cities=city::with('country')->get();

    return view('website.addresses',compact('Countries','cities','user'));
}


/**  
* add new address to user 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function addAddress(Request $request){

  
    $rules=[
        'address_name'=>'required|max:255',
        'first_name'=>'required|max:255',
        'last_name'=>'required|max:255',
        'country'=>'required|exists:country,id|max:255',
        'city'=>'required|exists:city,id|max:255',
        'street_name'=>'required|max:255',
        'building_name'=>'required|max:255',
        'floor'=>'required',
        'landLine'=>'int',
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
    return back();
}




/**  
* update address to user 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function updateAddress(Request $request,$id){
    
    $Address=Address::where('id',$id)->first();
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

    return back();
}


/**  
* delete address to user 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function deleteAddress($id){
    $Address=Address::where('id',$id)->delete();
    return back();
}

/**  
* show info of  user By id
* @pararm int $id user id 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function editSubmit(Request $request){
    $rules=[
        'first_name'=>'required|max:255',
        'last_name'=>'required|max:255',
        'email'=>'required|unique:users,email|max:255',
        'phone'=>'required|unique|max:50',
        'password' => 'required_with:password_confirmation|same:password_confirmation|min:8',
        'password_confirmation' => 'min:8',
        ];

    $user=Users::where('id',Auth::guard('users')->user()->id)->first();
    if($request->password){
        $user->password=\Hash::make($request->password);
    }
    $request->first_name  == null ?  : $user->first_name=$request->first_name;
    $request->last_name   == null ?  : $user->last_name =$request->last_name;
    $request->email       == null ?  : $user->email     =$request->email;
    $request->phone       == null ?  : $user->phone     =$request->phone;
    $request->password    == null ?  : $user->password  =$request->password;
    $request->image       == null ?  : $user->image     =$request->image;
    $request->Birthdate   == null ?  : $user->Birthdate =$request->day.'/'.$request->month.'/'.$request->year;
    $user->save();
    \App::getLocale() == 'ar' ?  \Notify::success('    تم تعديل  البيانات  بنجاح  ', '   تعديل بيانات الحساب   ') :  \Notify::success(' 
    The data has been modified successfully ','  Modify account data
    ');

    return back();
}


}
