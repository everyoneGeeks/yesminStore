
@extends('layoutDashboard.app',['title'=>'شكاوي '])
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


@component('components.panel',['subTitle'=>'  الشكاوي   '])
@if($orders->isEmpty())

@component('components.empty',['section'=>'الشكاوي ']) @endcomponent

@else

<table id="example2" class="table table-bordered table-hover example2">
        <thead>
        <tr>
        <th> رقم الشكوي  </th>
        <th> عنوان الشكوي  </th>
        <th> محتوي الشكوي  </th>
         <th> تاريخ الانشاء </th>
        <th> حاله الشكوي  </th>     
        </tr>
        </thead>
        <tbody>


@foreach($orders as $order)
<tr>
<th><a href="/admin/complain/info/{{$order->id}}"> {{$order->id}} </a></th>    
<th>{{$order->title}}</th>
<th>{{$order->subject}}</th>
<th>{{Carbon\Carbon::parse($order->created_at)->format('Y-m-d')}}</th>
@if($order->status == 'open')
<th><a href="/admin/complain/status/{{$order->id}}" class="btn btn-secondary"> غلق </a></th>
@else 
<th><a href="/admin/complain/status/{{$order->id}}" class="btn btn-success"> فتح </a></th>

@endif
</tr>

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
