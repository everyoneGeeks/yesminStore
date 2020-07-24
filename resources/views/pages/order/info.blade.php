
@extends('layoutDashboard.app',['title'=>'الطلبات'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة الطلبات'])

<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$order->id}}</span> <b class="float-right">مواد التجميل </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$order->user->name}}</span> <b class="float-right">  الوقت  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$order->price}}</span> <b class="float-right">  اجمالي السعر  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$order->discount}}</span> <b class="float-right">  حالة الطلب   </b>
                  </li>
                  <li class="list-group-item">
                    <span>
                      @if($order->status == 'new')
                      جديد
                      @elseif($order->status == 'inprogress')
                      قيد التنفيذ
                      @elseif($order->status == 'delivered')
                      تم التوصيل
                      @endif
                    </span> <b class="float-right">  رقم الهاتف  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$order->payment_method}}</span> <b class="float-right">  وسبلة الدفع  </b>
                  </li>

                  <li class="list-group-item">
                    <span>{{$order->extra_comment}}</span> <b class="float-right">  تعليق  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$order->fees}}</span> <b class="float-right">  رسوم  </b>
                  </li>
                  <li class="list-group-item">
                    <span><a href="/user/info/{{$order->user->id}}">{{$order->user->name}}</a></span> <b class="float-right">  اسم المستخدم  </b>
                  </li>
                  <li class="list-group-item">
                    <span><a href="/provider/info/{{$order->provider->id}}">{{$order->provider->name}}</a></span> <b class="float-right">اسم المندول  </b>
                  </li>

                  <li class="list-group-item">
                  <span>{{Carbon\Carbon::parse($order->created_at)->format('Y-m-d H:m a')}}</span> <b class="float-right"> تاريخ الانضمام </b>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      @endcomponent

  @component('components.panel',['subTitle'=>'الخدمات'])

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>اسم الخدمة   </th>
            <th> السعر  </th>
            <th> مركز تجميل   </th>
        </tr>
        </thead>
        <tbody>

        @foreach($order->product as $services)
      <tr>
      <th> {{$services->service}}</th>
      <th> {{$services->price}}</th>
      <th> {{$services->beauty->name}}</th>
      </tr>
      @endforeach
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--<th>اسم الخدمة   </th>-->
        <!--    <th> السعر  </th>-->
        <!--    <th> مركز تجميل   </th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>



@endcomponent
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
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "autoWidth": false
    });
  });
</script>
 @endsection
