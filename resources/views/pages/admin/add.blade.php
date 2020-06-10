

@extends('layout.app',['title'=>'المسئولين'])
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>' ادارة المسئولين'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('admin.add.submit')}}" method="post" id="formAdmin"  enctype="multipart/form-data" >
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr"> الاسم </label>
                    <input type="text" class="form-control" id="InputNameAr"  name="name">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn"> الايميل </label>
                    <input type="text" class="form-control" id="InputNameEn"  name="email">
                  </div>

                  <div class="form-group">
                    <label for="Inputpassword"> الرقم السري </label>
                    <input type="text" class="form-control" id="Inputpassword"  name="password">
                  </div>

                  <div class="form-group">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="admin" value=1 checked   name="admin">
                    <label class="form-check-label" for="exampleCheck1"> ادمن</label>
                  </div>
                  </div>
                  
                  

                                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
              </form>
            
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      @endcomponent
      
      
      
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

@component('components.checkbox',['title'=>' المستخدميين ','name'=>'users','permissions'=>0])@endcomponent
@component('components.checkbox',['title'=>' المندوبين    ','name'=>'provider','permissions'=>0])@endcomponent
@component('components.checkbox',['title'=>' الاقسام     ','name'=>'category','permissions'=>0])@endcomponent
@component('components.checkbox',['title'=>'مستوي المتجر ','name'=>'shop','permissions'=>0])@endcomponent
@component('components.checkbox',['title'=>' شحن الرصيد  ','name'=>'balance','permissions'=>0])@endcomponent         
@component('components.checkbox',['title'=>'الحسابات البنكية ','name'=>'Bank','permissions'=>0])@endcomponent
@component('components.checkbox',['title'=>'الاعلانات','name'=>'ad','permissions'=>0])@endcomponent
@component('components.checkbox',['title'=>' اكواد الخصم ','name'=>'category','permissions'=>0])@endcomponent 
@component('components.checkbox',['title'=>'الاشعارات','name'=>'Notification','permissions'=>0])@endcomponent
@component('components.checkbox',['title'=>'  اعدادات التطبيق ','name'=>'appSetting','permissions'=>0])@endcomponent    
@component('components.checkbox',['title'=>'المستخدميين','name'=>'users','permissions'=>0])@endcomponent
@component('components.checkbox',['title'=>'المندوبين','name'=>'provider','permissions'=>0])@endcomponent


       
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

@section('javascript')
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
 @endsection
 