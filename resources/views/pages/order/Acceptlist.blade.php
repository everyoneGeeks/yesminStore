
@extends('layoutDashboard.app',['title'=>'الطلبات'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
  <style>
  .highlight {
    background-color: #66d04461;
}
#example2_filter{
    float:left;
}
  </style>
@endsection

@section('content')


@component('components.panel',['subTitle'=>' الطلبات قيد التوصيل  '])
@if($orders->isEmpty())

@component('components.empty',['section'=>'الطلبات ']) @endcomponent

@else

<table id="example2" class="table table-bordered table-hover example2">
        <thead>
        <tr>
            <th> رقم الطلب </th>
            <th> اسم المستخدم  </th>
            <th>مكان التوصيل </th>
            <th> تاريخ الانشاء </th>
              <th> عرض   </th>
              <th> التوصيل    </th>

              <th>  حذف </th>

        </tr>
        </thead>
        <tbody>

@foreach($orders as $order)

<th>{{$order->order_id}}</th>
<th><a href="/admin/user/info/{{$order->user->id}}">{{$order->user->first_name}}</a></th>
<th>{{$order->address->city->name_ar}}</th>
<th>{{Carbon\Carbon::parse($order->created_at)->format('Y-m-d')}}</th>
<th><a href="/admin/order/info/{{$order->id}}" class="btn btn-block btn-primary btn-flat">عرض</a></th>
<th><a href="/admin/order/delivered/{{$order->id}}" class="btn btn-block btn-info btn-flat">تم التوصيل  </a></th>   

<th><a href="/admin/order/cancel/{{$order->id}}" class="btn btn-block btn-danger btn-flat">رفض </a></th>   


@endforeach
        </tbody>
        </table>

@endif

@endcomponent




 @endsection

 @section('javascript')
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.59/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.59/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>



<!-- page script -->

<script>

  $(function () {

    $('.example2').DataTable({

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
      "autoWidth": true,
        // "dom": 'Bfrtip',
        // "buttons": [ 'csv' ,'pageLength',
        // {
        //     extend: 'pdfHtml5',
        //     text: 'pdf',
        //     exportOptions: {
        //         modifier: {
        //             page: 'current'
        //         }}}]
    });
  });


</script>


 @endsection
