
@extends('layoutDashboard.app',['title'=>'المنتجات '] )
@section('style')
<link rel="stylesheet" href="{{asset('dist/css/bootstrap-imageupload.min.css')}}">
<!-- font -->
<link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css"><link rel="stylesheet" href="{{asset('dist/dist/jquery.fileuploader.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>'  تعديل  بيانات   المنتج '])
<div class="container-fluid">
        <div class="row">
        <div class="col-md-12 ">
<div class="text-center">

<img src="{{$product->main_image}}" width=150px>
</div>
          <div class="col-md-12 ">

          <form   
      role="form" action="{{route('product.edit.submit',$product->id)}}" method="post" enctype="multipart/form-data" >
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr"> الاسم المنتج عربي</label>
                    <input type="text" class="form-control" id="InputNameAr" value="{{$product->name_ar}}"  name="name_ar">
                  </div>


                  <div class="form-group">
                    <label for="InputNameEn"> الاسم  المنتج اجنبي</label>
                    <input type="text" class="form-control" id="InputNameEn"  value="{{$product->name_en}}" name="name_en">
                  </div>


                  <div class="form-group">
                    <label for="InputNameEn"> وصف  المنتج عربي</label>
                    <textarea  class="form-control"  value="{{$product->description_ar}}"  name="description_ar">  وصف المنتج </textarea>
                  </div>



                  <div class="form-group">
                    <label for="InputNameEn"> وصف  المنتج اجنبي</label>
                    <textarea  class="form-control"  value="{{$product->description_en}}"  name="description_en">  وصف المنتج </textarea>
                  </div>



                  <div class="form-group">
                    <label for="InputNameEn"> سعر  المنتج </label>
                    <input type="number" min=1 class="form-control" value="{{$product->price}}" id="InputNameEn"  name="price">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn"> الكمية المتاحة  المنتج </label>
                    <input type="number" min=1 class="form-control" id="InputNameEn" value="{{$product->amount}}"  name="amount">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn"> الخصم   المتاحة  المنتج </label>
                    <input type="number"  max=100 class="form-control" id="InputNameEn" value="{{$product->discount}}"  name="discount">
                  </div>


                  <div class="form-group">
                    <label for="InputNameAr">  القسم </label>
                    <select name="subcategory" id="category" class="form-control js-example-basic-single">
                    @foreach($categories as $category)
                    <optgroup label="{{$category->name_ar}}">
                    @foreach($category->subcategory as $subcategory)
                    @if($product->sub_category_id ==$subcategory->id)
                    <option  value="{{$subcategory->id}}" selected>{{$subcategory->name_ar}}</option>
                    @else  
                    <option  value="{{$subcategory->id}}">{{$subcategory->name_ar}}</option>

                    @endif
                    @endforeach
                    </optgroup>
                    @endforeach
                  </select>
                  </div>

                  <div class="form-group">

                    <label for="InputFile"> صوره الرائيسية للمنتج </label>
                    <div class="imageupload panel panel-default">
                  <div class="file-tab panel-body">
                      <label class="btn btn-default btn-file">
                          <span>اضافة </span>
                          <!-- The file is stored here. -->
                          <input type="file" name="main_image">
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
                  <div class="card-footer">
          <button type="submit" class="btn btn-primary">ارسال</button>
        </div>


                </div>
                <!-- /.card-body -->
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

      @component('components.panel',['subTitle'=>'ادارة صور المنتج'])


    <div class="col-lg-12">
@foreach($product->images as $images)

<div class="col-lg-3" style="display:inline-block">
    <div class="thumbnail">
      <img src="{{$images->image}}" alt="..." width="150px" height="150px">
      <div class="caption">

        <p class="text-center" style="margin-top:10px">
        <form   
      role="form" action="{{route('product.delete.image',$images->id)}}" method="post" enctype="multipart/form-data" >
          @csrf
          <input type="hidden" name="action" value="delete" />

        <button type="submit" class="btn btn-danger"  role="button">حذف</button></p>
        </form>
      </div>
    </div>
  </div>

@endforeach
    </div>
      <form   
      role="form" action="{{route('product.add.image',$product->id)}}" method="post" enctype="multipart/form-data" >
          @csrf

      <div class="form-group">
            

            <div class="custom-file-container" data-upload-id="myUniqueUploadId">
    <label> اضافة صور للمنتج <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>

    <label class="custom-file-container__custom-file" >
        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="*" multiple aria-label="اضافة صور " name="images[]" >
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
        <span class="custom-file-container__custom-file__custom-file-control"></span>
    </label>
    <div class="custom-file-container__image-preview"></div>
</div>
                           </div>

                           <input type="hidden" name="action" value="add" />

                           <div class="card-footer">
          <button type="submit" class="btn btn-info">اضافة </button>
        </div>

        </form>

      @endcomponent

 @endsection








 
        

 @section('javascript')
<!-- DataTables -->
<script src="{{asset('dist/js/bootstrap-imageupload.js')}}"></script>
<script src="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.js"></script><script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- page script -->
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();

});
var upload = new FileUploadWithPreview('myUniqueUploadId',{
  showDeleteButtonOnImages: true,
                text: {
                    chooseFile: 'اضافة صور   ',
                    browse: '  اضافة صور ',
                    selectedCount: 'صور المنتج',
                },
})

$('.imageupload').imageupload({
    allowedFormats: [ 'jpg', 'jpeg', 'png', 'gif'  ],
    maxFileSizeKb: 5000
});
</script>


 @endsection
