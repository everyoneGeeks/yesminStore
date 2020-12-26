
@extends('layoutDashboard.app',['title'=>'نوع الحفل '])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة نوع الحفل '])
@if($PartyThemes->isEmpty())

@component('components.empty',['section'=>'نوع الحفل  ']) @endcomponent

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
@foreach($PartyThemes as $PartyTheme)
        <tr>
<th> <a href="/admin/partyTheme/info/{{$PartyTheme->id}}">{{$PartyTheme->name_ar}}</a></th>
<th><a href="/admin/partyTheme/info/{{$PartyTheme->id}}"> {{$PartyTheme->name_en}}</a></th>
<th><a href="/admin/partyTheme/edit/{{$PartyTheme->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
<th><a href="/admin/partyTheme/delete/{{$PartyTheme->id}}" class="btn btn-block btn-danger btn-flat"> حذف </a></th>


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

<a  href="/admin/partyTheme/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة نوع حفل   </a>
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