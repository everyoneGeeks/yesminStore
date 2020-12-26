
@extends('layoutDashboard.app',['title'=>'الاقسام الفرعية'] )
@section('style')
<link rel="stylesheet" href="{{asset('dist/css/bootstrap-imageupload.min.css')}}">
@endsection
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>'  اضافة بيانات  القسم الفرعية '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('shipping.add')}}" method="post" enctype="multipart/form-data" >
          @csrf



          <div class="form-group">
                    <label for="InputNameAr">  اختر الدولة  </label>
                    <select name="country_id" id="country_id" class="form-control">
                    <option value="0">الدولة </option>
                    @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->name_ar}}</option>
@endforeach
                  </select>
                  </div>

          <div class="form-group">
                    <label for="InputNameAr">  القسم </label>
                    <select name="city_id" id="city_id" class="form-control">
                    <option value="0">اختر المدينة </option>
                    @foreach($city as $cit)
                    <option value="{{$cit->id}}">{{$cit->name_ar}}</option>
@endforeach
                  </select>
                  </div>


                  <div class="form-group">
                    <label for="InputNameEn">  التكلفة</label>
                    <input type="number" class="form-control" id="InputNameEn"  name="cost">
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
          </div>
          <!-- /.col -->

          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      @endcomponent



 @endsection


 @section('javascript')
<!-- DataTables -->
<script src="{{asset('dist/js/bootstrap-imageupload.js')}}"></script>
<!-- page script -->
<script>
$('.imageupload').imageupload({
    allowedFormats: [ 'jpg', 'jpeg', 'png', 'gif'  ],
    maxFileSizeKb: 5000
});
</script>

 @endsection
