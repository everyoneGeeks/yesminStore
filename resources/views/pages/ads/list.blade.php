
@extends('layout.app',['title'=>' الاعلانات'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة  الاعلانات'])
@if($ads->isEmpty())

@component('components.empty',['section'=>'الاعلانات']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th> الصور </th>
            <th>انتهاء التاريح </th>
            <th>الحالة</th>
            <th>التاريح الانشاء</th>
            <th>الافعال</th>
        </tr>
        </thead>
        <tbody>  
@foreach($ads as $ad)
        <tr>

<th><img src="{{asset('https://00a306-qamarwahed-orange.magdsoft.com/'.$ad->image)}}" width=50px > </th>
<th>{{Carbon\Carbon::parse($ad->end_date)->format('Y-m-d H:m a')}}</th>

@if($ad->is_active == 1)
<th><a  href="/ad/status/{{$ad->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a></th>
@else
<th><a  href="/ad/status/{{$ad->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a></th>
@endif
<th>{{Carbon\Carbon::parse($ad->created_at)->format('Y-m-d H:m a')}}</th>
<th><a href="/ad/edit/{{$ad->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
        </tr>

        @endforeach  

        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--    <th> الصور </th>-->
        <!--    <th>انتهاء التاريح </th>-->
        <!--    <th>الحالة</th>-->
        <!--    <th>التاريح الانشاء</th>-->
        <!--    <th>الافعال</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/ad/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة  اعلان  </a>
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