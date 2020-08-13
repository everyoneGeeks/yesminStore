@extends('layoutWebsite.app')
@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent


<div class="container">
                <div class="about contact">
                    <img src="{{asset('img/customer-services.svg')}}" class="customer-img" alt="contact-img">
                    <h4>{{App::getLocale() == 'ar' ? " تواصل معنا ": "CONTACT US"}}</h4>
                    <div class="contact-content">
                    <p>{!!App::getLocale() == 'ar' ? \App\websiteSetting::find(1)->contactus_ar :\App\websiteSetting::find(1)->contactus!!}

                    </div>
                </div>
            </div>






@endsection

