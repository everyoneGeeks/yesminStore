
@extends('layoutDashboard.app',['title'=>'حسابات بنكية'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة حسابات بنكية'])
@if($bankAccounts->isEmpty())

@component('components.empty',['section'=>'حسابات بنكية ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم بالعربي </th>
            <th>الاسم بالانجنبي</th>
            <th> الصور</th>
            <th> رقم الحساب</th>
            <th> اسم الشخص </th>
            <th>ip</th>
            <th>الحالة</th>
            <th>التاريح</th>
            <th>الافعال</th>
        </tr>
        </thead>
        <tbody>  
@foreach($bankAccounts as $bankAccount)
        <tr>
<th><a href="/Bank/account/info/{{$bankAccount->id}}"> {{$bankAccount->name_ar}}</a></th>
<th><a href="/Bank/account/info/{{$bankAccount->id}}"> {{$bankAccount->name_en}}</a></th>

<th><img src="{{asset('https://00a306-qamarwahed-orange.magdsoft.com/'.$bankAccount->image)}}" width=50px > </th>
<th> {{$bankAccount->account_number}}</th>
<th> {{$bankAccount->person_name}}</th>
<th> {{$bankAccount->ipan}}</th>

@if($bankAccount->is_active == 1)
<th><a  href="/Bank/account/status/{{$bankAccount->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a></th>
@else
<th><a  href="/Bank/account/status/{{$bankAccount->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a></th>
@endif
<th>{{Carbon\Carbon::parse($bankAccount->created_at)->format('Y-m-d H:m a')}}</th>
<th><a href="/Bank/account/edit/{{$bankAccount->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
        </tr>

        @endforeach  

        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--<th>الاسم بالعربي </th>-->
        <!--    <th>الاسم بالانجنبي</th>-->
        <!--    <th> الصور</th>-->
        <!--    <th> رقم الحساب</th>-->
        <!--    <th> اسم الشخص </th>-->
        <!--    <th>ip</th>-->
        <!--    <th>الحالة</th>-->
        <!--    <th>التاريح</th>-->
        <!--    <th>الافعال</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/Bank/account/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة حساب بنكي  </a>
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