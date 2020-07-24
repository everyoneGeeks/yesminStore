
@extends('layoutDashboard.app',['title'=>' الايميل '])
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent

@component('components.panel',['subTitle'=>' ادارة  الايميل '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('email.edit.submit',$appEmail->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card-body">

        <div class="form-group">
          <label for="InputNameAr"> الايميل</label>
          <input type="email" class="form-control" id="InputNameAr"  value="{{$appEmail->email}}" name="email">
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