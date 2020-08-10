


@if(App::getLocale() == 'ar')
<h1 style="
    text-align: center;
    width: 100%;
"> لايوجد {{$sectionِAr}}</h1>

@else 

<h1 style="
    text-align: center;
    width: 100%;
"> Not Found {{$sectionِEn}} </h1>

@endif