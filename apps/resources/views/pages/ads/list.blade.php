
@extends('layoutDashboard.app',['title'=>' الاعلانات'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' 1  الاعلانات'])
@if($ads->isEmpty())

@component('components.empty',['section'=>'1']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th> الصور </th>

            <th>اللغة </th>
            <th>الافعال</th>
            <th>حذف</th>
        </tr>
        </thead>
        <tbody>  
@foreach($ads as $ad)
        <tr>

<th><img src="{{asset($ad->image)}}" width=50px > </th>
<th>{{$ad->lang}}</th>

<th><a href="/admin/ad/edit/{{$ad->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
<th><a href="/admin/ad/delete/{{$ad->id}}" class="btn btn-block btn-danger btn-flat"> حذف </a></th>
        </tr>

        @endforeach  

        </tbody>

        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/admin/ad/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> 1  اعلان  </a>
</div>
@endslot

@endcomponent




@component('components.panel',['subTitle'=>' 2  '])
@if($costomerPhotos->isEmpty())

@component('components.empty',['section'=>'2']) @endcomponent

@else 

<table id="example4" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th> الصور </th>
            <th>اللغة </th>
            <th>الافعال</th>
            <th>حذف</th>
        </tr>
        </thead>
        <tbody>  
@foreach($costomerPhotos as $costomerPhoto)
        <tr>

<th><img src="{{asset($costomerPhoto->image)}}" width=50px > </th>

<th>{{$costomerPhoto->lang}}</th>

<th><a href="/admin/costomerPhoto/edit/{{$costomerPhoto->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
<th><a href="/admin/costomerPhoto/delete/{{$costomerPhoto->id}}" class="btn btn-block btn-danger btn-flat"> حذف </a></th>
        </tr>

        @endforeach  

        </tbody>

        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/admin/costomerPhoto/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة  صورة 2   </a>
</div>
@endslot

@endcomponent




@component('components.panel',['subTitle'=>' 3 '])
@if($costomerRates->isEmpty())

@component('components.empty',['section'=>'3']) @endcomponent

@else 

<table id="example3" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th> الصور </th>
            <th>اللغة </th>
            <th>الافعال</th>
            <th>حذف</th>
        </tr>
        </thead>
        <tbody>  
@foreach($costomerRates as $costomerRate)
        <tr>

<th><img src="{{asset($costomerRate->image)}}" width=50px > </th>

<th>{{$costomerRate->lang}}</th>

<th><a href="/admin/costomerRate/edit/{{$costomerRate->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
<th><a href="/admin/costomerRate/delete/{{$costomerRate->id}}" class="btn btn-block btn-danger btn-flat"> حذف </a></th>
        </tr>

        @endforeach  

        </tbody>

        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/admin/costomerRate/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة  صورة 3   </a>
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