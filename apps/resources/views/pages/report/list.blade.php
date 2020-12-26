
@extends('layoutDashboard.app',['title'=>'التقارير ' ,'subTitle'=>' التقارير '])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' البحث'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('reports.search')}}" method="get" enctype="multipart/form-data" >

                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr"> من </label>
                    <input type="date" class="form-control" id="InputNameAr"  name="start_at">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn"> الي </label>
                    <input type="date" class="form-control" id="InputNameEn"  name="end_at">
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
                </div>
              </form>
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
@endcomponent




@component('components.panel',['subTitle'=>' البحث'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-4 ">

          <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">المستخدمين</span>
                <span class="info-box-number">{{$user}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-4 ">

          <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">المندوبين</span>
                <span class="info-box-number">{{$provider}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


          <div class="col-md-4 ">

<div class="info-box">
    <span class="info-box-icon bg-info"><i class="fa fa-list-alt "></i></span>

    <div class="info-box-content">
      <span class="info-box-text">الطلبات</span>
      <span class="info-box-number">{{$order}}</span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!-- /.col -->

          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
@endcomponent



@if(isset($users) )
@component('components.panel',['subTitle'=>' بيانات المستخدم'])




@if($users->isEmpty())
@component('components.empty',['section'=>'مستخدميين ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم  </th>
            <th>الايميل</th>
            <th> الصور</th>
            <th>الهاتف</th>
            <th>الحالة</th>
            <th>رصيد حساب</th>
        </tr>
        </thead>
        <tbody>  
@foreach($users as $user)
        <tr>
<th> <a href="/user/info/{{$user->id}}">{{$user->name}}</th>
<th> {{$user->email}}</th>
<th><img src="{{asset($user->image)}}" width=50px > </th>
<th> {{$user->phone}}</th>
@if($user->is_active == 1)
<th><a  href="/user/status/{{$user->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a></th>
@else
<th><a  href="/user/status/{{$user->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a></th>
@endif

<th> $ {{$user->balance}}</th>

          
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


@endif
@endcomponent
@endif
@if(isset($providers) )

@component('components.panel',['subTitle'=>' بيانات المندوب'])


@if($providers->isEmpty())

@component('components.empty',['section'=>'المندوبين ']) @endcomponent

@else 

<table id="example3" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم  </th>
            <th>الايميل</th>
            <th> الصور</th>
            <th>الهاتف</th>
            <th>الحالة</th>
            <th>رصيد حساب</th>
        </tr>
        </thead>
        <tbody>  
@foreach($providers as $provider)
        <tr>
<th> <a href="/provider/info/{{$provider->id}}">{{$provider->name}}</th>
<th> {{$provider->email}}</th>
<th><img src="{{asset($provider->image)}}" width=50px > </th>
<th> {{$provider->phone}}</th>
@if($provider->is_active == 1)
<th><a  href="/provider/status/{{$provider->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a></th>
@else
<th><a  href="/provider/status/{{$provider->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a></th>
@endif

<th> $ {{$provider->balance}}</th>

          
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

@endif

@endcomponent
@endif

@if(isset($orders) )
@component('components.panel',['subTitle'=>' ادارة الطلبات'])

@if($orders->isEmpty())

@component('components.empty',['section'=>'الطلبات ']) @endcomponent

@else 

<table id="example4" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th> رقم الطلب </th>
            <th>مواد التجميل</th>
            <th> جدول الجلسة</th>
            <th>حاله الطلب </th>
            <th>السعر الكلي </th>
            <th> تاريخ الانشاء </th>
            <th> اسم المستخدم  </th>
            <th>   اسم المندوب </th>
        </tr>
        </thead>
        <tbody>  

@foreach($orders as $order)
@if($order->created_at >= Carbon\Carbon::now())
<tr class="highlight">
@else
<tr>
@endif
        
<th> {{$order->id}}</th>        
<th> <a href="/order/info/{{$order->id}}">{{$order->cosmetic_material}}</a></th>
<th>{{Carbon\Carbon::parse($order->schedule_session)->format('Y-m-d H:m a')}}</th>
<th>{{$order->status}}</th>
<th>{{$order->total}}</th>
<th>{{Carbon\Carbon::parse($order->created_at)->format('Y-m-d H:m a')}}</th>

<th><a href="/user/info/{{$order->user->id}}">{{$order->user->name}}</a></th>
<th><a href="/provider/info/{{$order->provider->id}}">{{$order->provider->name}}</a></th>
        </tr>
        @endforeach  
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--<th> رقم الطلب </th>-->
        <!--    <th>مواد التجميل</th>-->
        <!--    <th> جدول الجلسة</th>-->
        <!--    <th>حاله الطلب </th>-->
        <!--    <th>السعر الكلي </th>-->
        <!--    <th> تاريخ الانشاء </th>-->
        <!--    <th> اسم المستخدم  </th>-->
        <!--    <th>   اسم المندوب </th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

@endif


@endcomponent
@endif
 @endsection     

 @section('javascript')
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- page script -->
<script>
  $(function () {

    $('#example2').DataTable({
        "language": {
            "paginate": {
                "next": "بعد",
                "previous" : "قبل"
            }
        },
      "info" : true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "autoWidth": false
    });
  });
</script>



<!-- page script -->
<script>
  $(function () {

    $('#example3').DataTable({
        "language": {
            "paginate": {
                "next": "بعد",
                "previous" : "قبل"
            }
        },
      "info" : true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "autoWidth": false
    });
  });
</script>



<!-- page script -->
<script>
  $(function () {

    $('#example4').DataTable({
        "language": {
            "paginate": {
                "next": "بعد",
                "previous" : "قبل"
            }
        },
      "info" : true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "autoWidth": false
    });
  });
</script>

 @endsection