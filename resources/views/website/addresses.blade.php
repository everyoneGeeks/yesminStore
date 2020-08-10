@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/addresses.css')}}">
@endsection

@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent
<div class="cart-details">
            <div class="container">
                <div class="row">
                @component('components.userInfoDashboardList',['user'=>$user]) @endcomponent
                <div class="col-md-8">
<h3><img src="{{asset('img/Location.svg')}}" alt="">{{App::getLocale() == 'ar' ? "عناوين الشحن":"Shipping Addresses"}}</h3>

@if($user->address)
@component('components.userAddress',['user'=>$user,'Countries'=>$Countries,'cities'=>$cities]) @endcomponent
@endif

</div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('javascript')
<script>
$( document ).ready(function() {
    $('#country').change(function(){
    $('#city option')
        .hide() // hide all
        .filter('[data-country="'+$(this).val()+'"]') // filter options with required value
            .show(); // and show them
});
});


</script>
@endsection