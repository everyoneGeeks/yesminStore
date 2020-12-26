
@extends('layoutDashboard.app',['title'=>' اكواد الخصم'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة  اكواد الخصم'])
@if($codes->isEmpty())

@component('components.empty',['section'=>'اكواد الخصم']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th> الكود </th>
            <th>انتهاء التاريح </th>
            <th>التاريح الانشاء</th>
            <th>نسبة الخصم</th>
            <th> عدد مرات الاستخدم </th>
            <th>الحالة</th>
            <th>الافعال</th>
        </tr>
        </thead>
        <tbody>  
@foreach($codes as $code)
        <tr>

<th>{{$code->code}} </th>
<th>{{Carbon\Carbon::parse($code->end_date)->format('Y-m-d H:m a')}}</th>
<th>{{Carbon\Carbon::parse($code->created_at)->format('Y-m-d H:m a')}}</th>
<th>{{$code->discount}} </th>
<th>{{$code->count}} </th>

@if($code->is_active == 1)
<th><a  href="/code/status/{{$code->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a></th>
@else
<th><a  href="/code/status/{{$code->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a></th>
@endif

<th><a href="/code/edit/{{$code->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
        </tr>

        @endforeach  

        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--<th> الكود </th>-->
        <!--    <th>انتهاء التاريح </th>-->
        <!--    <th>التاريح الانشاء</th>-->
        <!--    <th>نسبة الخصم</th>-->
        <!--    <th> عدد مرات الاستخدم </th>-->
        <!--    <th>الحالة</th>-->
        <!--    <th>الافعال</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/code/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة  كود  </a>
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