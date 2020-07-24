@extends('layoutDashboard.app',['title'=>'الشكاوي' ,'subTitle'=>'ادارة  الشكاوي '])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' الشكاوي'])
@if($Complains->isEmpty())

@component('components.empty',['section'=>'الشكاوي ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
        <th>id  </th>
            <th>الرساله</th>
            <th> الحالة </th>
            <th>المستخدم</th>
            <th> المندوب</th>
            <th>التاريخ</th>
        </tr>
        </thead>
        <tbody>  
@foreach($Complains as $Complain)
        <tr>
        <th>{{$Complain->id}}</th> 
        <th> {{$Complain->message}}</th>  
        @if($Complain->status == "open")
        <th><span class="badge bg-success"> مفتوح</span> </th>
        @else
        <th><span class="badge bg-danger">مغلق </span> </th>
        @endif  

        @if($Complain->user !== NULL)       
  
      <th> <a href="/user/info/{{$Complain->user->id}}">{{$Complain->user->name}}</th>
      @else
      <th> - </th>
      @endif


@if($Complain->provider !== NULL)   
      
<th> <a href="/provider/info/{{$Complain->provider->id}}">{{$Complain->provider->name}}</th>
@else
<th> - </th>
@endif

<th>{{Carbon\Carbon::parse($Complain->created_at)->format('Y-m-d H:m a')}}</th>
          
        </tr>

        @endforeach  
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--     <th>id  </th>-->
        <!--    <th>الرساله</th>-->
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