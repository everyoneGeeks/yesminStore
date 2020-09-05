@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
<div class="login-form register">
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent

            <form action="/signup/submit" method="post">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">{{App::getLocale() == 'ar' ? "الاسم الاول" : "first name"}}</label>
                            <input type="text" class="form-control" id="first_name"  name="first_name" placeholder="{{App::getLocale() == 'ar' ? 'الاسم الاول' : 'first name'}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name">{{App::getLocale() == 'ar' ? "الاسم الاخير " : "last name"}}</label>
                            <input type="text" class="form-control" id="last_name"  name="last_name" placeholder="{{App::getLocale() == 'ar' ? 'ادخل الاخير ' : 'last name'}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">{{App::getLocale() == 'ar' ? "الايميل " : "Email"}}</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="{{App::getLocale() == 'ar' ? '  الايميل ' : 'Your Email  '}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">{{App::getLocale() == 'ar' ? 'رقم الهاتف (اختياري)' : 'Phone (optional)'}}</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="{{App::getLocale() == 'ar' ? ' رقم الهاتف ' : 'Phone Number   '}} ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">{{App::getLocale() == 'ar' ? ' الباسورد' : ' Password'}}</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="{{App::getLocale() == 'ar' ? '  الباسورد ' : 'Password '}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation">{{App::getLocale() == 'ar' ? ' تاكيد الباسورد' : ' Password confirmation'}}</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{App::getLocale() == 'ar' ? '  تاكيد الباسورد  ' : 'Password confirmation '}}">
                        </div>
                    </div>
                </div>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="terms" value=true>
                <label class="form-check-label" for="exampleCheck1" style="{{ App::getLocale() == 'ar' ?  'margin-right: 20px;' : '' }}" >{{App::getLocale() == 'ar' ? '  اوافق علي  ' : 'I accept the '}}
                 <a   data-toggle="modal" data-target="#myModal"  style="color: #61bfd0;">{{App::getLocale() == 'ar' ? '  سياسة الخصوصية ' : 'Privacy policy
'}}</a>
<p style="
    color: #ff0000c9;
    text-align: left;
    margin-top: 5px;
    margin-bottom: 0px;
    font-size: medium;
">{{App::getLocale() == 'ar' ? '   يجب الموافقة علي سياسة الخصوصية  ' : 'Privacy policy
'}}</p>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">{{App::getLocale() == 'ar' ? '  سياسة الخصوصية ' : 'Privacy policy
'}}</h4>
        <button type="button" style="
    margin-left: 0px;
" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
       {{ App::getLocale() == 'ar' ?  \App\websiteSetting::find(1)->terms_policy_ar  : \App\websiteSetting::find(1)->terms_policy }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{App::getLocale() == 'ar' ? ' اغلاق  ' : 'Close'}}</button>
      </div>
    </div>
  </div>
</div>
                 
                 </label>
                </div>
                <button type="submit" class="btn btn-block ">{{App::getLocale() == 'ar' ? '  انشاء الحساب  ' : 'Create Account'}}</button>
            </form>
        </div>
    </div>


    
@endsection