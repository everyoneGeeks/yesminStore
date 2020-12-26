
@extends('layoutDashboard.app',['title'=>'الاقسام الفرعية '] )
@section('style')
<link rel="stylesheet" href="{{asset('dist/css/bootstrap-imageupload.min.css')}}">
@endsection
@section('content')
@component('components.panel',['subTitle'=>'  تعديل بيانات  القسم الفرعي '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">
<div class="text-center">

<img src="{{$subCategory->image}}" width=150px>
</div>
          <form role="form" action="{{route('subcategory.edit.submit',$subCategory->id)}}" method="post" enctype="multipart/form-data">
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr"> الاسم عربي</label>
                    <input type="text" class="form-control" id="InputNameAr" value=" {{$subCategory->name_ar}}" name="name_ar">
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn"> الاسم اجنبي</label>
                    <input type="text" class="form-control" id="InputNameEn" value=" {{$subCategory->name_en}}" name="name_en">
                  </div>

                  <div class="form-group">
                    <label for="InputNameAr">  القسم </label>
                    <select name="category_id" id="subcategor" class="form-control">
                    <option value="{{$subCategory->category->id}}" selected > {{$subCategory->category->name_ar}} </option>
                    @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->name_ar}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="form-group">

                    <label for="InputFile"> صوره القسم</label>
                    <div class="imageupload panel panel-default">
                  <div class="file-tab panel-body">
                      <label class="btn btn-default btn-file">
                          <span>اضافة </span>
                          <!-- The file is stored here. -->
                          <input type="file" name="image">
                      </label>

                      <button type="button" class="btn btn-default">حذف</button>
                  </div>
                  <div class="url-tab panel-body">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Image URL">
                      </div>
                      <button type="button" class="btn btn-default">لالبابلابل</button>
                      <!-- The URL is stored here. -->
                      <input type="hidden" name="image">
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
