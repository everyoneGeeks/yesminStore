
@extends('layoutDashboard.app',['title'=>' الاعلانات'])
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
            <th> تاريخ البداء </th>
            <th> تاريخ الانتهاء </th>
            <th>اللغة </th>
            <th>الحاله </th>
            <th>الافعال</th>
            <th>حذف</th>
        </tr>
        </thead>
        <tbody>  
@foreach($ads as $ad)
        <tr>

<th><img src="{{asset($ad->image)}}" width=50px > </th>
<th>{{Carbon\Carbon::parse($ad->start_from)->format('Y-m-d H:m a')}}</th>
<th>{{Carbon\Carbon::parse($ad->end_at)->format('Y-m-d H:m a')}}</th>
<th>{{$ad->lang}}</th>
<th>
@if(Carbon\Carbon::parse($ad->start_from)->greaterThanOrEqualTo(Carbon\Carbon::now()))

  <span class="badge badge-info"> قريبا  </span>  
@else 

@if(Carbon\Carbon::now()->greaterThanOrEqualTo(Carbon\Carbon::parse($ad->start_from)) 
&& Carbon\Carbon::now()->lessThanOrEqualTo(Carbon\Carbon::parse($ad->end_at)))  
<span class="badge badge-success">  يعرض الان  </span> 
@else
<span class="badge badge-danger"> انتهي الاعلان </span> 
@endif
@endif

</th>
<th><a href="/admin/ad/edit/{{$ad->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
<th><a href="/admin/ad/edit/{{$ad->id}}" class="btn btn-block btn-danger btn-flat"> حذف </a></th>
        </tr>

        @endforeach  

        </tbody>

        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/admin/ad/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة  اعلان  </a>
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