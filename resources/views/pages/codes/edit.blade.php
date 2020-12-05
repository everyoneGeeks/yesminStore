@extends('layoutDashboard.app',['title'=>' اكواد الخصم'])
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>' ادارة  اكواد الخصم'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">
          <form role="form" action="{{route('code.edit.submit',$code->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card-body">

<div class="form-group">
  <label for="InputNameAr">  تاريخ الانتهاء</label>
  <input type="date" class="form-control" id="InputNameAr"  value="{{$code->end_date}}" name="end_date">
</div>

<div class="form-group">
  <label for="InputNameAr">   الكود</label>
  <input type="number" class="form-control" id="InputNameAr"  value="{{$code->code}}" name="code">
</div>

<div class="form-group">
  <label for="InputNameAr">  نسبة الخصم</label>
  <input type="number" class="form-control" id="InputNameAr"  value="{{$code->discount}}" name="discount">
</div>


<div class="form-group">
  <label for="InputNameAr">   عدد مرات الاستخدام </label>
  <input type="number" class="form-control" id="InputNameAr"  value="{{$code->count}}" name="count">
</div>




                  <div class="form-check">
                      @if($code->is_active == 1)
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" checked value="1" name="active">
                    @else
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="1" name="active">
                    @endif
    
                    <label class="form-check-label" for="exampleCheck1">  مفعل </label>
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