<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;
use App\passwordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| authenticationController
|--------------------------------------------------------------------------
| this will handle register , login , logout , reset&forget password  user part (CRUD)
|
*/
/** 
             _   _                _   _           _   _             
            | | | |              | | (_)         | | (_)            
  __ _ _   _| |_| |__   ___ _ __ | |_ _  ___ __ _| |_ _  ___  _ __  
 / _` | | | | __| '_ \ / _ \ '_ \| __| |/ __/ _` | __| |/ _ \| '_ \ 
| (_| | |_| | |_| | | |  __/ | | | |_| | (_| (_| | |_| | (_) | | | |
 \__,_|\__,_|\__|_| |_|\___|_| |_|\__|_|\___\__,_|\__|_|\___/|_| |_|

 */
class authenticationController extends Controller
{

/**
 * register Form User
 * @return  Viwe Html
 */
public function registerForm()
{

 return view('website.register');
}

/**
 * register Submit User
 * @return  Viwe Html
 */
public function registerSbmit(Request $request)
{
    $rules=[
        'first_name'=>'required|max:255',
        'last_name'=>'required|max:255',
        'email'=>'required|unique:users,email|max:255',
        'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:8',
        'phone'=>'required|numeric',
        'terms'=>'required|accepted',
        ];



   $request->validate($rules);  
   
   $user=new Users();
   $user->first_name=$request->first_name;
   $user->last_name=$request->last_name;
   $user->email=$request->email;
   $user->phone=$request->phone;
   $user->password=\Hash::make($request->password);
   $user->is_accept=1;
   $user->image="img/user-image.svg";
   $user->is_active=1;
   $user->save();
   Auth::guard('users')->loginUsingId($user->id);
    if(\App::getLocale() == 'ar'){
   \Notify::success('   تم التسجيل بنجاح ', '   مرحبا بعودتك
   ');
}else{
    \Notify::success('  welcome back    ', ' successfully registered
    ');

}
 return \redirect('/');
}





/**
 * Login Form User
 * @return  Viwe Html
 */
public function loginForm(Request $request)
{

    return view('website.login');

}

/**
 * Login Submit User
 * @return  Viwe Html
 */
public function loginSubmit(Request $request)
{
    $rules=[
        'email'=>'required|exists:users,email|max:255',
        'password'=>'required',
           ];



   $request->validate($rules);  
   if (Auth::guard('users')->attempt(['email' => $request->email,'password' => $request->password, 'is_active' => 1],$request->remember)) {
    return redirect()->intended('/');
    }else{
        if(\App::getLocale() == 'ar')
        {
            $errors = new MessageBag(['password' => ['.الايميل او الباسورد غير صحيح']]); 
        }else{
        $errors = new MessageBag(['password' => ['Email and/or password invalid.']]); 
        }
        return redirect()->back()->withErrors($errors); 
    }

}


/**
 * Forget Password Form User
 * @return  Viwe Html
 */
public function forgetPasswordForm(Request $request)
{

    return view('website.forgetPassword');

}



/**
 * Forget password Submit User
 * @return  Viwe Html
 */
public function forgetPasswordSubmit(Request $request)
{
    $rules=[
        'email'=>'required|exists:users,email|max:255',
           ];



   $request->validate($rules);  
   

   $passwordReset=new passwordReset();
   $passwordReset->email=$request->email;
   $passwordReset->token=\str_random(60);
   $passwordReset->created_at=Carbon::now();
   $passwordReset->save();

   \Mail::send('auth.verify',['token' => $passwordReset->token], function($message) use ($request) {
    $message->from($request->email);
    $message->to('codingdriver15@gmail.com');
    $message->subject('Reset Password Notification');
 });
 \App::getLocale() == 'ar' ?  \Notify::success('    تم ارسال الايميل بنجاح  ', '  استرجاع الباسورد ') :  \Notify::success(' email has been send ','  password Reset  ');

 return back();
}


public function getPassword($token) {

    return view('auth.passwords.Websitereset', ['token' => $token]);
 }

 public function updatePassword(Request $request)
 {

     $request->validate([
         'email' => 'required|email|exists:password_resets,email',
         'password' => 'required_with:password_confirmation|same:password_confirmation|min:8',
         'password_confirmation' => 'min:8',

     ]); 

     $updatePassword = passwordReset::where(['email' => $request->email, 'token' => $request->token])
                         ->first();

     if(!$updatePassword)
         return back()->withInput()->with('error', 'Invalid token!');

       $user = Users::where('email', $request->email)
                   ->update(['password' => \Hash::make($request->password)]);

        passwordReset::where(['email'=> $request->email])->delete();

       return redirect('/signin');

 }

 
 public function logout(Request $request) {
    Auth::guard('users')->logout();
    $request->session()->invalidate();
    return redirect('/signin');
  }
}
