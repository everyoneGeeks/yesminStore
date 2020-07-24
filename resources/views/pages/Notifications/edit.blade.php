@extends('layoutDashboard.app',['title'=>' الاشعارات'])
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>' ادارة الاشعارات'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('Notification.edit.submit',$Notification->id)}}" method="post" enctype="multipart/form-data">
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr"> الاشعار بالعربي</label>
                    <input type="text" class="form-control" id="InputNameAr" value="{{$Notification->content_ar}}" name="content_ar">
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn"> الاشعار بالانجنبي</label>
                    <input type="text" class="form-control" id="InputNameEn" value=" {{$Notification->content_en}}" name="content_en">
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