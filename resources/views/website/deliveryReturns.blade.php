@extends('layoutWebsite.app')
@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent
<div class="container">
            <div class="about">
               <img src="{{asset('img/DELIVER-ON-TIME.svg')}}" class="delivery-img" alt="delivery-img">
               <h4 class="delivery-header">{{App::getLocale() == 'ar' ? "  معلومات التوصيل ": "DELIVERY INFORMATION"}}</h4>
                <div class="delivery-content">
                <p>{!!App::getLocale() == 'ar' ? \App\websiteSetting::find(1)->delivery_info_ar :\App\websiteSetting::find(1)->delivery_info!!}

                
                </div>
            </div>

            <div class="about">
                <img src="{{asset('img/return-box.svg')}}" class="delivery-img return-img" alt="delivery-img">
                <h4 class="delivery-header">{{App::getLocale() == 'ar' ? "  سياسه الارجاع ": "DELIVERY INFORMATION"}}</h4>
                 <div class="delivery-content return">
                     <p>{!!App::getLocale() == 'ar' ? \App\websiteSetting::find(1)->delivery_returns_ar :\App\websiteSetting::find(1)->delivery_returns!!}



                 </div>
             </div>
        </div>






@endsection

