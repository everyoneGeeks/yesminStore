@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection

@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent
<div class="cart-details">
            <div class="container">
                <div class="row">
                @component('components.userInfoDashboardList',['user'=>$user]) @endcomponent
                    <div class="col-md-8">
                        <div class="profile-info">
                         
                            <h3><img src="{{ asset('img/User profile.svg') }}" alt="">{{App::getLocale() == 'ar' ? "الحساب":"Profile"}}</h3>
                            <div class="user-prief">
                                <img src="{{asset('img/user-image.svg')}}" alt="">
                                <p>{{$user->first_name}} {{ $user->last_name }} </p>
                            </div>
                            <form action="/profile/update" method="post">
                            @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="fname">{{App::getLocale() == 'ar' ? "الاسم الاول ":"First Name"}}</label>
                                        <input type="text" class="form-control" id="fname" name="first_name" value="{{$user->first_name}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lname">{{App::getLocale() == 'ar' ? "الاسم الاخير  ":"Last Name"}}</label>
                                        <input type="text" class="form-control" id="lname" name="last_name" value="{{$user->last_name}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">{{App::getLocale() == 'ar' ? "البريد الإلكترونى":"Email"}}</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">{{App::getLocale() == 'ar' ? " رقم الهاتف":"Phone Number"}}</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                                    </div>
                                    <div class="form-group col-12 date">
                                        <label for="birth">{{App::getLocale() == 'ar' ? " تاريخ الميلاد":"Birthdate"}}</label>
                                        <div>
                                            @if($user->Birthdate !==null)
                                        <input type="number" class="form-control" id="birth" placeholder="Day" name="day"  value="{{ \Carbon\Carbon::parse($user->Birthdate)->year}}">
                                        <input type="number" class="form-control" id="birth" placeholder="Month" name="month"  value="{{ \Carbon\Carbon::parse($user->Birthdate)->month}}">
                                        <input type="number" class="form-control" id="birth" placeholder="Year" naem="year" value="{{ \Carbon\Carbon::parse($user->Birthdate)->day}}">
                                            @else
                                            <input type="number" class="form-control" id="birth" placeholder="Day" name="day"  >
                                        <input type="number" class="form-control" id="birth" placeholder="Month" name="month"  >
                                        <input type="number" class="form-control" id="birth" placeholder="Year" naem="year">                                        
                                            @endif
                                        </div>
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="npassword"> {{App::getLocale() == 'ar' ? "   كلمة المرور الجديدة ":"New Password"}}</label>
                                        <input type="password" class="form-control" id="npassword" name="password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cpassword">{{App::getLocale() == 'ar' ? "   كلمة المرور الجديدة ":"Confirm Password"}}</label>
                                        <input type="password" class="form-control" id="cpassword" name="password_confirmation">
                                    </div>
                                </div>
                                <button type="submit" class="btn">{{App::getLocale() == 'ar' ? " حفظ ":"Save changes"}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

