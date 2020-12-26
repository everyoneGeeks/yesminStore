@extends('layoutDashboard.app', ['title'=>'Social Media'])
@section('style')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('close/css/fontawesome.min.css')}}" />
<link rel="stylesheet" href="{{asset('close/css/framework.css')}}" />
@endsection
@section('content')
@component('components.error',['errors' => $errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=> 'Social Media Settings'])
<form role="form" action="{{route('appSetting.links.edit')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="main-box social-websites">
    <p class="description">Leave Empty If You Don't Want To Show in Website</p>
    <div class="social-box">
      <i class="fab fa-facebook"></i>
      <input type="text" name="facebook" value="{{$appSetting->facebook}}" placeholder="Your Facebook URl" />
    </div>
    <div class="social-box">
      <i class="fab fa-twitter-square"></i>
      <input type="text" name="twitter" value="{{$appSetting->twitter}}" placeholder="Your Twitter URl" />
    </div>
    <div class="social-box">
      <i class="fab fa-youtube"></i>
      <input type="text" name="youTube" value="{{$appSetting->youTube}}" placeholder="Your Youtube URl" />
    </div>
    <div class="social-box">
      <i class="fab fa-instagram-square"></i>
      <input type="text" name="instagram" value="{{$appSetting->instagram}}" placeholder="Your Instagram URl" />
    </div>
    <div class="social-box">
      <i class="fab fa-pinterest-square"></i>
      <input type="text" name="pinterest" value="{{$appSetting->pinterest}}" placeholder="Your Pinterest URl" />
    </div>
    <div class="social-box">
      <i class="fab fa-tiktok"></i>
      <input type="text" name="tiktok"  value="{{$appSetting->tiktok}}" placeholder="Your Tik Tok URl" />
    </div>
    <div class="social-box">
      <i class="fab fa-snapchat-square"></i>
      <input type="text" name="snapchat"  value="{{$appSetting->snapchat}}" placeholder="Your SnapChat URl" />
    </div>
  </div>
  <button type="submit" class="m-t-20 btn btn-primary">Save</button>
</form>
@endcomponent
@endsection

@section('javascript')
<script src="{{asset('close/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('close/js/master.js')}}"></script>
@endsection
