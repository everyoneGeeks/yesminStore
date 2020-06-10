
@extends('layout.app',['title'=>' هاتف '])
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent

@component('components.panel',['subTitle'=>' ادارة  الهواتف'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('phone.edit.submit',$appPhone->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card-body">

        <div class="form-group">
          <label for="InputNameAr"> الهاتف</label>
          <input type="number" class="form-control" id="InputNameAr"  value="{{$appPhone->phone}}" name="phone">
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