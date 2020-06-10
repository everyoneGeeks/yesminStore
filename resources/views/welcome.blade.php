
@extends('layout.app',['title'=>'الاحصائيات' ,'subTitle'=>'ادارة الاحصائيات'])
@section('content')
<div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">المستخدمين</span>
                <span class="info-box-number">{{$users->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">المندوبين</span>
                <span class="info-box-number"> {{$provider->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-bullhorn"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">الاعلانات</span>
                <span class="info-box-number">{{$ads->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i aria-hidden="true" class="fa fa-shopping-cart "></i></span>

              <div class="info-box-content">
                <span class="info-box-text">الطلبات</span>
                <span class="info-box-number">{{$orders->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

@component('components.panel',['subTitle'=>'اخر المندوبين '])

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم  </th>
            <th>التاريخ</th>
            <th>الحالة</th>
        </tr>
        </thead>
        <tbody>  
@foreach($lastProvider as $provider)
        <tr>
<th> <a href="/provider/info/{{$provider->id}}">{{$provider->name}}</th>

<th>{{Carbon\Carbon::parse($provider->created_at)->format('Y-m-d')}}</th>

@if($provider->is_active == 1)
<th><a  href="/provider/status/{{$provider->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a></th>
@else
<th><a  href="/provider/status/{{$provider->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a></th>
@endif


          
        </tr>

        @endforeach  
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--    <th>الاسم  </th>-->
        <!--    <th>الايميل</th>-->
        <!--    <th> الصور</th>-->
        <!--    <th>الهاتف</th>-->
        <!--    <th>الحالة</th>-->
        <!--    <th>رصيد حساب</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

@endcomponent



@component('components.panel',['subTitle'=>'اخر المستخدميين '])

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم  </th>
            <th>التاريخ</th>
            <th>الحالة</th>
        </tr>
        </thead>
        <tbody>  
@foreach($lastUser as $user)
        <tr>
<th> <a href="/user/info/{{$user->id}}">{{$user->name}}</th>
<th>{{Carbon\Carbon::parse($user->created_at)->format('Y-m-d')}}</th>
@if($user->is_active == 1)
<th><a  href="/user/status/{{$user->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a></th>
@else
<th><a  href="/user/status/{{$user->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a></th>
@endif

          
        </tr>

        @endforeach  
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--    <th>الاسم  </th>-->
        <!--    <th>الايميل</th>-->
        <!--    <th> الصور</th>-->
        <!--    <th>الهاتف</th>-->
        <!--    <th>الحالة</th>-->
        <!--    <th>رصيد حساب</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>
@endcomponent
<div class="row">
  
<div class="col-lg-12" style="
    margin-bottom: 40px;
">
{!! $providerChart->html() !!}
</div>

<div class="col-lg-12">
{!! $userChart->html() !!}
</div>

</div>
 @endsection        

 @section('javascript')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
 {!! Charts::scripts() !!}
{!! $userChart->script() !!}
{!! $providerChart->script() !!}
 @endsection