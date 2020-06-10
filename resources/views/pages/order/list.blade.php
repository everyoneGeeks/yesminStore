
@extends('layout.app',['title'=>'الطلبات'])
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

@component('components.panel',['subTitle'=>' ادارة الطلبات'])
@if($orders->isEmpty())

@component('components.empty',['section'=>'الطلبات ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
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
      "autoWidth": true,
        "dom": 'Bfrtip', 
        "buttons": [ 'csv' ,'pageLength',
        {
            extend: 'pdfHtml5',
            text: 'pdf',
            exportOptions: {
                modifier: {
                    page: 'current'
                }}}]
    });
  });
  

</script>


 @endsection