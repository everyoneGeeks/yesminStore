@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent
<div class="login-form">
            <form action="/forgetPassword/submit" method="post">
            @csrf

                <div class="form-group">
                    <label for="email">{{App::getLocale() == 'ar' ? "يرجى إدخال عنوان البريد الإلكتروني. سنرسل لك رابطًا إلى عنوان البريد الإلكتروني هذا لإعادة تعيين كلمة المرور الخاصة بك. ": "Please enter the e-mail address. We will send you a link to this e-mail address to reset your password. "}}</label>
                    <input type="email" class="form-control" id="email" name="email"  placeholder="{{App::getLocale() == 'ar' ? 'الايميل الخاص': ' Your Email'}}">
                </div>
             
                <button type="submit" class="btn btn-block ">{{App::getLocale() == 'ar' ?  "إعادة تعيين كلمة المرور" : "Reset Password "}}</button>
            </form>
        </div>
    </div>



@endsection

