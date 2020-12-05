
@extends('layoutDashboard.app',['title'=>'حسابات بنكية'])
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>' اضافة حسابات بنكية'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('Bank.account.add.submit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="InputNameAr"> الاسم عربي</label>
                    <input type="text" class="form-control" id="InputNameAr"  name="name_ar">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn"> الاسم اجنبي</label>
                    <input type="text" class="form-control" id="InputNameEn"  name="name_en">
                  </div>

                  <div class="form-group">
                    <label for="account_number"> رقم الحساب</label>
                    <input type="text" class="form-control" id="account_number"  name="account_number">
                  </div>


                  <div class="form-group">
                    <label for="person_name"> اسم الشخص</label>
                    <input type="text" class="form-control" id="person_name"  name="person_name">
                  </div>


                  <div class="form-group">
                    <label for="ipan"> ip</label>
                    <input type="text" class="form-control" id="ipan"  name="ipan">
                  </div>

                  <div class="form-group">
                    <label for="InputFile"> صوره القسم</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="InputFile" name="image">
                        <label class="custom-file-label" for="InputFile"> صوره القسم</label>
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