
@extends('layoutDashboard.app',['title'=>'المنتجات '])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة المنتجات'])
@if($products->isEmpty())

@component('components.empty',['section'=>'المنتجات ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover ">
        <thead>
        <tr>
            <th>الاسم بالعربي </th>
            <th>القسم  </th>
            <th>القسم  الفرعي </th>
            <th>  السعر  </th>
            <th>  الكمية  </th>
            <th>  الخصم  </th>
            <th> الصور</th>
            <th>الافعال</th>
            <th> حذف</th>
        </tr>
        </thead>
        <tbody>  

@foreach($products as $product)

        <tr>
<th> <a href="/admin/product/info/{{$product->id}}">{{$product->name_ar}}</a></th>
<th><a href="/admin/category/info/{{$product->category->id}}"> {{$product->category->name_ar}}</a></th>
<th><a href="/admin/subcategory/info/{{$product->subcategory->id}}"> {{$product->subcategory->name_ar}}</a></th>
<th>{{ $product->price }} </th>
<th>{{ $product->amount  }} </th>
<th>{{ $product->discount }} </th>
<th><img src="{{asset($product->main_image)}}" width=50px > </th>
<th><a href="/admin/product/edit/{{$product->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
<th><a href="/admin/product/delete/{{$product->id}}" class="btn btn-block btn-danger btn-flat"> حذف </a></th>

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

<a  href="/admin/product/add" class="btn btn-block btn-success btn-lg">
 <i class="fa fa-plus" aria-hidden="true"></i> اضافة  منتج  </a>
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