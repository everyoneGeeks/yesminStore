
@extends('layoutDashboard.app',['title'=>' الاشعارات'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة الاشعارات'])
@if($Notifications->isEmpty())

@component('components.empty',['section'=>' الاشعارات ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاشعار بالعربي </th>
            <th>الاشعار بالانجنبي</th>

            <th>الافعال</th>
        </tr>
        </thead>
        <tbody>  
@foreach($Notifications as $Notification)
        <tr>
<th><a href="/Notification/info/{{$Notification->id}}"> {{$Notification->content_ar}}</a></th>
<th><a href="/Notification/info/{{$Notification->id}}"> {{$Notification->content_en}}</a></th>

<th><a href="/Notification/edit/{{$Notification->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
        </tr>

        @endforeach  

        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--<th>الاشعار بالعربي </th>-->
        <!--    <th>الاشعار بالانجنبي</th>-->

        <!--    <th>الافعال</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/Notification/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة  اشعار  </a>
</div>
@endslot

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
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "autoWidth": false
    });
  });
</script>

 @endsection