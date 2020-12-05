@if(App\websiteSetting::find(1)->Close == 'no')
@if(App\websiteSetting::find(1)->CloseType == 1)
@include('closeStatus2')

@else 

@include('closeStatus1')

@endif

@else
@include('layoutWebsite.header')
@include('layoutWebsite.body')
@include('layoutWebsite.footer')

@endif