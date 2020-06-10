@extends('layout.app',['title'=>'المسئولين'])
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent

@component('components.panel',['subTitle'=>' تعديل بيانات  المسئول'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('admin.edit.submit',$admin->id)}}" method="post" id="formAdmin" >
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr"> الاسم </label>
                    <input type="text" class="form-control" id="InputNameAr"  name="name" value="{{$admin->name}}">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn"> الايميل </label>
                    <input type="text" class="form-control" id="InputNameEn"  name="email" value="{{$admin->email}}">
                  </div>

                  <div class="form-group">
                    <label for="Inputpassword"> الرقم السري </label>
                    <input type="text" class="form-control" id="Inputpassword"  name="password" >
                  </div>

                  <div class="form-group">
                  <div class="form-check">
                  @if($admin->is_super_admins  == 1)
                    <input type="checkbox" class="form-check-input" id="admin" value=1   name="admin" checked>
                    @else
                    <input type="checkbox" class="form-check-input" id="admin" value=1   name="admin" >
                    @endif
                    <label class="form-check-label" for="exampleCheck1"> ادمن</label>
                  </div>
                  </div> 
                  </div>                

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
             

   

          </form>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      @endcomponent


@if($admin->is_super_admins == 0)

   @component('components.panel',['subTitle'=>'الصلاحيات'])
   <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>القسم  </th>
            <th> اضافة </th>
            <th> تعديل  </th>
            <th> حذف  </th>
        </tr>
        </thead>
        <tbody>  
@component('components.tableCheckbox',['title'=>' المستخدميين ','name'=>'users','permissions'=>$permissions])@endcomponent
@component('components.tableCheckbox',['title'=>' المندوبين    ','name'=>'provider','permissions'=>$permissions])@endcomponent
@component('components.tableCheckbox',['title'=>' الاقسام     ','name'=>'category','permissions'=>$permissions])@endcomponent
@component('components.tableCheckbox',['title'=>'مستوي المتجر ','name'=>'shop','permissions'=>$permissions])@endcomponent
@component('components.tableCheckbox',['title'=>' شحن الرصيد  ','name'=>'balance','permissions'=>$permissions])@endcomponent         
@component('components.tableCheckbox',['title'=>'الحسابات البنكية ','name'=>'Bank','permissions'=>$permissions])@endcomponent
@component('components.tableCheckbox',['title'=>'الاعلانات','name'=>'ad','permissions'=>$permissions])@endcomponent
@component('components.tableCheckbox',['title'=>' اكواد الخصم ','name'=>'category','permissions'=>$permissions])@endcomponent 
@component('components.tableCheckbox',['title'=>'الاشعارات','name'=>'Notification','permissions'=>$permissions])@endcomponent
@component('components.tableCheckbox',['title'=>'  اعدادات التطبيق ','name'=>'appSetting','permissions'=>$permissions])@endcomponent    
@component('components.tableCheckbox',['title'=>'المستخدميين','name'=>'users','permissions'=>$permissions])@endcomponent
@component('components.tableCheckbox',['title'=>'المندوبين','name'=>'provider','permissions'=>$permissions])@endcomponent


       
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--    <th>القسم  </th>-->
        <!--    <th> اضافة </th>-->
        <!--    <th> تعديل  </th>-->
        <!--    <th> حذف  </th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>



@endcomponent
@endif

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
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "autoWidth": false
    });
  });
</script>
<script>
$('input[type="checkbox"][name="admin"]').change(function() {
     if(this.checked) {
      $("input[type=checkbox]").not('#admin').prop('checked', $(this).prop('checked')).attr("disabled", true);
     }else{
      $("input[type=checkbox]").not('#admin').prop('checked', false).attr("disabled", false);
     }
 });

</script>
 @endsection



