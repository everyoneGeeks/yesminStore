
@extends('layoutDashboard.app',['title'=>' الاشعارات'])
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent

@component('components.panel',['subTitle'=>' ادارة الاشعارات'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('Notification.add.submit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="InputNameAr"> الاشعار  العربي </label>
                    <textarea  type="text" class="form-control" id="InputNameAr"  name="content_ar"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn">الاشعار  الاجنبي </label>
                    <textarea  type="text" class="form-control" id="InputNameEn"  name="content_en"></textarea>
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