
@extends('layoutDashboard.app',['title'=>' الشحن '])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة  الشحن'])
@if($shippings->isEmpty())

@component('components.empty',['section'=>' شحن ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th> الدولة  </th>
            <th> المدينة </th>
            <th>تكلفة الشحن  </th>
            <th>الافعال</th>
            <th> حذف</th>
        </tr>
        </thead>
        <tbody>  

@foreach($shippings as $shipping)

        <tr>
        
<th><a href="/admin/shipping/info/{{$shipping->id}}" > {{$shipping->country->name_ar}}</a></th>
<th> {{$shipping->cities->name_en}}</th>
<th> {{$shipping->cost}}</th>
<th><a href="/admin/shipping/edit/{{$shipping->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
<th><a href="/admin/shipping/delete/{{$shipping->id}}" class="btn btn-block btn-danger btn-flat"> حذف </a></th>

        </tr>

        @endforeach  
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--<th>الاسم بالعربي </th>-->
        <!--    <th>الاسم بالانجنبي</th>-->
        <!--    <th> الصور</th>-->
        <!--    <th>الافعال</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/admin/shipping/add" class="btn btn-block btn-success btn-lg">
 <i class="fa fa-plus" aria-hidden="true"></i> اضافة  شحن  </a>
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
            },
            "search":"بحث:",
            "lengthMenu":     "النتائج_MENU_",
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