
@extends('layout.app',['title'=>'المسئولين'])
@section('content')

@component('components.panel',['subTitle'=>' ادارة المسئولين'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$admin->name}}</span> <b class="float-right">الاسم    </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$admin->email}}</span> <b class="float-right">  الايميل </b>
                  </li>


                </ul>
                @if($admin->is_super_admins == 1)
                <li class="list-group-item">
                <span class="badge badge-success h3">الادمن</span><b class="float-right"> الصلاحية </b>
                  </li>
                @else
                <li class="list-group-item">
                <span class="badge badge-warning h3">مسئول</span> <b class="float-right">  الصلاحية </b>
                  </li>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
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
        <tfoot>
        <tr>
            <th>القسم  </th>
            <th> اضافة </th>
            <th> تعديل  </th>
            <th> حذف  </th>
        </tr>
        </tfoot>
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
 @endsection
