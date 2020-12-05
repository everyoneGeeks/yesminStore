@extends('layoutWebsite.app')
@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent
<div class="container">
                <div class="about">
                    <h4>{{App::getLocale() == 'ar' ? " سياسة الخصوصية ": " Privacy Policy"}}</h4>
                    <p>{!!App::getLocale() == 'ar' ? \App\websiteSetting::find(1)->terms_policy_ar :\App\websiteSetting::find(1)->terms_policy!!}
</p>
                </div>
            </div>




@endsection

