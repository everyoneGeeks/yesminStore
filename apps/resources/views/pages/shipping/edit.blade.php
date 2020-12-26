
@extends('layoutDashboard.app',['title'=>' الشحن '] )
@section('style')
<link rel="stylesheet" href="{{asset('dist/css/bootstrap-imageupload.min.css')}}">
@endsection
@section('content')
@component('components.panel',['subTitle'=>'  تعديل بيانات   الشحن '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">
<div >

          <form role="form" action="{{route('shipping.edit.submit',$shipping->id)}}" method="post" enctype="multipart/form-data">
          @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="InputNameAr">  اختر الدولة  </label>
                    <select name="country_id" id="country_id" class="form-control">
                    <option value="0">الدولة </option>
                    @foreach($countries as $country)
                    @if($country->id == $shipping->country_id)
                    <option value="{{$country->id}}" selected >{{$country->name_ar}}</option>
                    @else 
                    <option value="{{$country->id}}" >{{$country->name_ar}}</option>

                    @endif

                    @endforeach
                  </select>
                  </div>

          <div class="form-group">
                    <label for="InputNameAr">  القسم </label>
                    <select name="city_id" id="city_id" class="form-control">
                    <option value="0">اختر المدينة </option>
                    @foreach($city as $cit)
                    @if($cit->id == $shipping->city_id)
                    <option value="{{$cit->id}}" selected>{{$cit->name_ar}}</option>
                    @esle 
                    <option value="{{$cit->id}}">{{$cit->name_ar}}</option>

                    @endif
@endforeach
                  </select>
                  </div>


                  <div class="form-group">
                    <label for="InputNameEn">  التكلفة</label>
                    <input type="number" class="form-control" id="InputNameEn"  name="cost" value="{{$shipping->cost}}">
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

$( document ).ready(function() {
$('.countryAddress').change(function(){
    var countryID = $(this).val();    
    var cityAddress=$(this).attr('data-address');
    if(countryID){
        $.ajax({
           type:"GET",
           url:'/admin/shipping/cities/'+countryID,
           success:function(res){   
             console.log(res);            
            if(res){
             $('#city-'+cityAddress).empty();
             $('#city-'+cityAddress).append('<option>Select</option>');
                $.each(res,function(key,value){
        
                    if(key=='data'){
                    value.forEach(function(city,index, value){

                    console.log(city);
                    @if(App::getLocale() == 'ar')
                    $('#city-'+cityAddress).append('<option value="'+city.cities.id+'">'+city.cities.name_ar+'</option>');
                

                    @else 
                    $('#city-'+cityAddress).append('<option value="'+city.cities.id+'">'+city.cities.name_en+'</option>');


                    @endif
                });
                }
                });
           
            }else{
                $('#city-'+cityAddress).empty();
            }
           }
        });
    }else{
        $('#city-'+cityAddress).empty();

    }      
   });
  });
</script>


 @endsection
