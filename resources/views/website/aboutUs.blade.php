@extends('layoutWebsite.app')
@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent
<div class="container">
                <div class="about">
                    <h4>{{App::getLocale() == 'ar' ? "من نحن ": "ABOUT US"}}</h4>
                    <p>{!!App::getLocale() == 'ar' ? \App\websiteSetting::find(1)->aboutus_ar :\App\websiteSetting::find(1)->aboutus!!}
</p>
                </div>
            </div>




@endsection

