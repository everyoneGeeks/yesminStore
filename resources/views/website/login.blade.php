@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent
<div class="login-form">
            <form action="/signin/submit" method="post">
            @csrf

                <div class="form-group">
                    <label for="email">{{App::getLocale() == 'ar' ? "الايميل ": "Email"}}</label>
                    <input type="email" class="form-control" id="email" name="email"  placeholder="{{App::getLocale() == 'ar' ? 'الايميل الخاص': ' Your Email'}}">
                </div>
                <div class="form-group">
                    <label for="password">{{App::getLocale() == 'ar' ? "الباسورد": "Password"}}</label>
                    <input type="password" class="form-control" id="password"  name="password" placeholder="{{App::getLocale() == 'ar' ? 'الباسورد': 'Password'}}">
                </div>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                <label class="form-check-label" for="exampleCheck1">{{App::getLocale() == 'ar' ? "تذكرني": "Remember me"}}</label>
                <a href="/forgetPassword" class="forget">{{App::getLocale() == 'ar' ? "نسيت كلمة السر ؟": "Forget your password?"}}</a>
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

