@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/party-supplies.css')}}">
@endsection
@section('content')

        <!-- Party supplies secondary categories -->
        <div class="party-supplies">
                <div class="container">
                    <div class="row">
                        @foreach($subCategories as $subCategory)
                        <div class="col-md-4">
                            <div class="one-category">
                                <a href="/products/{{$subCategory->id}}">
                                    <img src="{{asset($subCategory->image)}}" alt="">
                                    <h4>{{App::getLocale() == 'ar' ? $subCategory->name_ar : $subCategory->name_en}}</h4>
                                </a>
                            </div>
                        </div>
                        @endforeach
                       
                    </div>
                </div>
            </div>



@endsection