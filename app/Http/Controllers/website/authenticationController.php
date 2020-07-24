<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;
use App\passwordReset;
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

 return view('website.homePage',compact('ads','costomerRate','costomerPhoto','topSellingProduct','newProduct'));
}

/**
 * register Submit User
 * @return  Viwe Html
 */
public function registerSbmit(Request $request)
{
    $rules=[
        'name'=>'required|max:255',
        'email'=>'required|unique:users,email|max:255',
        'password'=>'required|min:8',
        'phone'=>'required|numeric',
        'terms'=>'required|accepted',
        ];



   $request->validate($rules,$message);  
   
   $user=new Users();
   $user->name=$request->name;
   $user->email=$request->email;
   $user->password=\Hash::make($request->passord);
   $user->is_accept=1;
   $user->is_active=1;
   $user->save();

    
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
        'password'=>'required|min:8',
           ];



   $request->validate($rules,$message);  
   
   if (Auth::attempt(['email' => $request->email,'password' => $request->password, 'is_active' => 1],$remember)) {
    return redirect()->intended('/');
    }

}


/**
 * Forget Password Form User
 * @return  Viwe Html
 */
public function forgetPasswordForm(Request $request)
{

    return view('website.ForgetPassword');

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



   $request->validate($rules,$message);  
   

   $passwordReset=new passwordReset();
   $passwordReset->email=$request->email;
   $passwordReset->token=\str_random(60);
   $passwordReset->created_at=Carbon::now();
   $passwordReset->save();

   Mail::send('auth.password.verify',['token' => $passwordReset->token], function($message) use ($request) {
    $message->from($request->email);
    $message->to('codingdriver15@gmail.com');
    $message->subject('Reset Password Notification');
 });
 return back()->with('message', 'We have e-mailed your password reset link!');
}


public function getPassword($token) {

    return view('auth.password.reset', ['token' => $token]);
 }

 public function updatePassword(Request $request)
 {
     $request->validate([
         'email' => 'required|email|exists:users',
         'password' => 'required|string|min:6|confirmed',
         'password_confirmation' => 'required',

     ]);

     $updatePassword = passwordReset::where(['email' => $request->email, 'token' => $request->token])
                         ->first();

     if(!$updatePassword)
         return back()->withInput()->with('error', 'Invalid token!');

       $user = Users::where('email', $request->email)
                   ->update(['password' => \Hash::make($request->password)]);

        passwordReset::where(['email'=> $request->email])->delete();

       return redirect('/login')->with('message', 'Your password has been changed!');

 }

 

}
