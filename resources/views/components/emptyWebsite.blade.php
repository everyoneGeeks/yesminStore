
@php 
$emptyCart == null ?  $emptyCart =null: $emptyCart  ;
@endphp

@if(App::getLocale() == 'ar')
<h1 style="
    text-align: center;
    width: 50%;
    border:  solid;
    border-color: pink;
    color: pink;
"> لايوجد {{$sectionِAr}}</h1>

@elseif($emptyCart)
<h1 style="
    text-align: center;
    width: 50%;
    border:  solid;
    border-color: pink;
    color: pink;
"> Your cart is empty </h1>

@else 

<h1 style="
    text-align: center;
    width: 50%;
    border:  solid;
    border-color: pink;
    color: pink;
"> Not Found {{$sectionِEn}} </h1>

@endif