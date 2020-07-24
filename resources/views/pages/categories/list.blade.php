
@extends('layoutDashboard.app',['title'=>'الاقسام'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة الاقسام'])
@if($categories->isEmpty())

@component('components.empty',['section'=>'اقسام ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم بالعربي </th>
            <th>الاسم بالانجنبي</th>
            <th>الافعال</th>
        </tr>
        </thead>
        <tbody>  
@foreach($categories as $category)
        <tr>
<th> <a href="/category/info/{{$category->id}}">{{$category->name_ar}}</a></th>
<th><a href="/category/info/{{$category->id}}"> {{$category->name_en}}</a></th>
<th><a href="/category/edit/{{$category->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
        </tr>

        @endforeach  
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--<th>الاسم بالعربي </th>-->
        <!--    <th>الاسم بالانجنبي</th>-->
        <!--    <th>الافعال</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/category/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة متجر  </a>
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