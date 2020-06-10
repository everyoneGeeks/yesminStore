
@extends('layout.app',['title'=>'الاعلانات'])
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>' اضافة اعلان'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('ad.add.submit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="InputNameAr">  تاريخ الانتهاء</label>
                    <input type="date" class="form-control" id="InputNameAr"  name="end_date">
                  </div>


                  <div class="form-group">
                    <label for="InputFile"> صوره القسم</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="InputFile" name="image">
                        <label class="custom-file-label" for="InputFile"> صوره الاعلان</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-check">

                    <input type="checkbox" class="form-check-input" id="exampleCheck1" checked value="1" name="active">

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