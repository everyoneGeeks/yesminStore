@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
@section('content')
<div class="login-form">
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent

            <form action="/signin/submit" method="post">
            @csrf

                <div class="form-group">
                    <label for="email">{{App::getLocale() == 'ar' ? "البريد الإلكترونى  ": "Email"}}</label>
                    <input type="email" class="form-control" id="email" name="email"  placeholder="{{App::getLocale() == 'ar' ? ' البريد الإلكترونى ': ' Your Email'}}">
                </div>
                <div class="form-group">
                    <label for="password">{{App::getLocale() == 'ar' ? "كلمة المرور": "Password"}}</label>
                    <input type="password" class="form-control" id="password"  name="password" placeholder="{{App::getLocale() == 'ar' ? 'كلمة المرور': 'Password'}}">
                </div>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                <label class="form-check-label" for="exampleCheck1" style="margin-right: 21px;">{{App::getLocale() == 'ar' ? "تذكرني": "Remember me"}}</label>
                </br>
          
                <a href="/forgetPassword" style="
    margin-bottom: 9px;
" class="forget">{{App::getLocale() == 'ar' ? "نسيت كلمة السر ؟": "Forget your password?"}}</a>
      </div>
                <button type="submit" class="btn btn-block ">{{App::getLocale() == 'ar' ? "تسجيل ": "Login"}}</button>
            </form>
            <div class="create">
                <p>{{App::getLocale() == 'ar' ? "ليس لديك حساب  ": "You have not account"}}</p>
                <a href="/signup">{{App::getLocale() == 'ar' ? "انشاء حسابك الان": "Register Now"}}</a>
            </div>
        </div>
    </div>



@endsection

