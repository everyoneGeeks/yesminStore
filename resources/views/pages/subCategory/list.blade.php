
@extends('layoutDashboard.app',['title'=>'الاقسام الفرعية '])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة الاقسام الفرعية'])
@if($subCategories->isEmpty())

@component('components.empty',['section'=>'اقسام الفرعية ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم بالعربي </th>
            <th>الاسم بالانجنبي</th>
            <th>القسم  </th>
            <th> الصور</th>
            <th>الافعال</th>
            <th> حذف</th>
        </tr>
        </thead>
        <tbody>  

@foreach($subCategories as $subCategor)

        <tr>
<th> <a href="/admin/subcategory/info/{{$subCategor->id}}">{{$subCategor->name_ar}}</a></th>
<th><a href="/admin/subcategory/info/{{$subCategor->id}}"> {{$subCategor->name_en}}</a></th>
<th><a href="/admin/category/info/{{$subCategor->category->id}}"> {{$subCategor->category->name_ar}}</a></th>
<th><img src="{{asset($subCategor->image)}}" width=50px > </th>
<th><a href="/admin/subcategory/edit/{{$subCategor->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
<th><a href="/admin/subcategory/delete/{{$subCategor->id}}" class="btn btn-block btn-danger btn-flat"> حذف </a></th>

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

<a  href="/admin/subcategory/add" class="btn btn-block btn-success btn-lg">
 <i class="fa fa-plus" aria-hidden="true"></i> اضافة قسم فرعي  </a>
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