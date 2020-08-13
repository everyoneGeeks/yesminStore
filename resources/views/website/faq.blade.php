@extends('layoutWebsite.app')
@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent
<div class="container">
                <div class="about">
                    <img src="{{asset('img/faq.svg')}}" class="faq-img" alt="contact-img">
                    <h4 class="faq-header">{{App::getLocale() == 'ar' ? "الاسئلة الشائعة":"FAQS"}}</h4>
                    <div class="faq-content">
                        @foreach($faqs as $faq)
                        <h3>{{$faq->questions}}</h3>
                        <p>{{$faq->answer}}</p>
                        @endforeach

                    </div>
                </div>
            </div>


@endsection

