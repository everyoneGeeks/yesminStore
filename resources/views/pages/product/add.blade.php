
@extends('layoutDashboard.app',['title'=>'المنتجات '] )
@section('style')
<link rel="stylesheet" href="{{asset('dist/css/bootstrap-imageupload.min.css')}}">
<!-- font -->
<link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css"><link rel="stylesheet" href="{{asset('dist/dist/jquery.fileuploader.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>'  اضافة بيانات   المنتج '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form   
      role="form" action="{{route('product.add.submit')}}" method="post" enctype="multipart/form-data" >
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr"> الاسم المنتج عربي</label>
                    <input type="text" class="form-control" id="InputNameAr"  name="name_ar">
                  </div>


                  <div class="form-group">
                    <label for="InputNameEn"> الاسم  المنتج اجنبي</label>
                    <input type="text" class="form-control" id="InputNameEn"  name="name_en">
                  </div>


                  <div class="form-group">
                    <label for="InputNameEn"> وصف  المنتج عربي</label>
                    <textarea id="some-textarea1" class="form-control"   name="description_ar" placeholder=" وصف المنتج" style="styles to copy to the iframe"></textarea>

                  </div>



                  <div class="form-group">
                    <label for="InputNameEn"> وصف  المنتج اجنبي</label>
                    <div id="editor" data-placeholder="Go on, start editing..."></div>
                    <textarea id="some-textarea" class="form-control"   name="description_en" placeholder=" وصف المنتج" style="styles to copy to the iframe"></textarea>

                  </div>

                  <div class="form-group">
                    <label for="InputNameEn">   المناسبة </label>
                    <select name="occasions[]" class="form-control js-example-responsive" multiple="multiple" >
                    @foreach($occasions as $occasion)
                    <option value="{{$occasion->id}}">{{$occasion->name_ar}}</option>
                    @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn">   الشخصيات </label>
                    <select name="characters[]" class="form-control js-example-responsive" multiple="multiple" >
                    @foreach($characters as $character)
                    <option value="{{$character->id}}">{{$character->name_ar}}</option>
                    @endforeach
                    </select>
                  </div>                  

                  <div class="form-group">
                    <label for="InputNameEn">   نوع الحفل  </label>
                    <select name="Party_Theme[]" class="form-control js-example-responsive" multiple="multiple" >
                    @foreach($Party_Theme as $partytheme)
                    <option value="{{$partytheme->id}}">{{$partytheme->name_ar}}</option>
                    @endforeach
                    </select>
                  </div>     

                  <div class="form-group">
                    <label for="InputNameEn">   الحجم   </label>
                    <select name="size[]" class="form-control js-example-responsive" multiple="multiple" >
                    @foreach($size as $sizeproduct)
                    <option value="{{$sizeproduct->id}}">{{$sizeproduct->name_ar}}</option>
                    @endforeach
                    </select>
                  </div>                       

               
                  <div class="form-group">
                    <label for="InputNameEn">   فيديو المنتج  </label>
                    <input type="url"  class="form-control" id="InputNameEn"  name="url">
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn"> سعر  المنتج </label>
                    <input type="number" min=1 class="form-control" id="InputNameEn"  name="price">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn"> الكمية المتاحة  المنتج </label>
                    <input type="number" min=1 class="form-control" id="InputNameEn"  name="amount">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn"> الخصم   المتاحة  المنتج </label>
                    <input type="number"  max=100 class="form-control" id="InputNameEn"  name="discount">
                  </div>


                  <div class="form-group">
                    <label for="InputNameAr">  القسم </label>
                    <select name="subcategory" id="category" class="form-control js-example-basic-single">
                    @foreach($categories as $category)
                    <optgroup label="{{$category->name_ar}}">
                    @foreach($category->subcategory as $subcategory)
                    <option value="{{$subcategory->id}}">{{$subcategory->name_ar}}</option>
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
                    selectedCount: 'Custom Files Selected Copy',
                },
})

$('.imageupload').imageupload({
    allowedFormats: [ 'jpg', 'jpeg', 'png', 'gif'  ],
    maxFileSizeKb: 5000
});

$(".js-example-responsive").select2({
    width: 'resolve' // need to override the changed default
});




</script>


 @endsection
