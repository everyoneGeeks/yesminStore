@extends('layoutDashboard.app',['title'=>'شحن الرصيد' ,'subTitle'=>'ادارة شحن الرصيد '])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>'  شحن الرصيد'])
@if($BalanceRecharge->isEmpty())

@component('components.empty',['section'=>'رصيد ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الصورة  </th>
            <th>المبلغ او الرصيد </th>
            <th> الحالة </th>
            <th>المستخدم</th>
            <th> المندوب</th>
            <th>التاريخ</th>
            <th>الافعال</th>
        </tr>
        </thead>
        <tbody>  
@foreach($BalanceRecharge as $Balance)
        <tr>
        <th><img src="{{asset('https://00a306-qamarwahed-orange.magdsoft.com/'.$Balance->image)}}" width=50px > </th> 
        <th> {{$Balance->amount}}</th>  
        @if($Balance->is_approved == 1)
        <th><span class="badge bg-success"> موافق</span> </th>
        @else
        <th><span class="badge bg-danger">غير موافق</span> </th>
        @endif  

  @if($Balance->user !== NULL)         
<th> <a href="/user/info/{{$Balance->user->id}}">{{$Balance->user->name}}</th>
@else
<th> - </th>
@endif


@if($Balance->provider !== NULL)         
<th> <a href="/provider/info/{{$Balance->provider->id}}">{{$Balance->provider->name}}</th>
@else
<th> - </th>
@endif
<th>{{Carbon\Carbon::parse($Balance->created_at)->format('Y-m-d H:m a')}}</th>
<th><a href="/balance/recharging/info/{{$Balance->id}}" class="btn btn-block btn-info btn-flat"> تفاصيل </a></th>

          
        </tr>

        @endforeach  
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--<th>الصورة  </th>-->
        <!--    <th>المبلغ او الرصيد </th-->
        <!--    <th> الحالة </th>-->
        <!--    <th>المستخدم</th>-->
        <!--    <th> المندوب</th>-->
        <!--    <th>التاريخ</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

@endif
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