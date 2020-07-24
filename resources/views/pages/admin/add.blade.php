@extends('layoutDashboard.app',['title'=>'المسئولين'])
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
                    <label for="Inputpassword">  كلمة السر </label>
                    <input type="text" class="form-control" id="Inputpassword"  name="password">
                  </div>

                  <div class="form-group">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="admin" value=1    name="admin">
                    <label class="form-check-label" for="exampleCheck1"> ادمن</label>
                  </div>
                  </div>
                  
                  

                                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">اضافة </button>
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
        
@component('components.checkbox',['title'=>' الاقسام     ','name'=>'category','permissions'=>0])@endcomponent
@component('components.checkbox',['title'=>' المنتجات    ','name'=>'product','permissions'=>0])@endcomponent
@component('components.checkbox',['title'=>' اكواد الخصم ','name'=>'coupon','permissions'=>0])@endcomponent 
@component('components.checkbox',['title'=>'الطالبات','name'=>'order','permissions'=>0])@endcomponent
@component('components.checkbox',['title'=>' المستخدميين ','name'=>'user','permissions'=>0])@endcomponent
@component('components.checkbox',['title'=>'الاعلانات','name'=>'ad','permissions'=>0])@endcomponent
@component('components.checkbox',['title'=>'  اعدادات الموقع  ','name'=>'webSetting','permissions'=>0])@endcomponent    
@component('components.checkbox',['title'=>'خدمات الدفع الالكتروني ','name'=>'payment','permissions'=>0])@endcomponent


       
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
 