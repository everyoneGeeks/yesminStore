
@extends('layout.app',['title'=>'الاقسام الفرعية '] )
@section('content')

@component('components.panel',['subTitle'=>'  تعديل بيانات  القسم الفرعي '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">
<div class="text-center">

<img src="{{$subcategor->logo)}}" width=150px>
</div>
          <form role="form" action="{{route('subcategor.edit.submit',$subcategor->id)}}" method="post" enctype="multipart/form-data">
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr"> الاسم عربي</label>
                    <input type="text" class="form-control" id="InputNameAr" value=" {{$subcategor->name_ar}}" name="name_ar">
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn"> الاسم اجنبي</label>
                    <input type="text" class="form-control" id="InputNameEn" value=" {{$subcategor->name_en}}" name="name_en">
                  </div>

                  <div class="form-group">
                    <label for="InputNameAr">  القسم </label>
                    <select name="category_id" id="subcategor">
                    <option value="{{$Subcategory->category->id}}" selected > {{$Subcategory->category->name_ar}} </option>
                    @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->name_ar}}</option>

                  </select>
                  </div>
                  <div class="form-group">

                    <label for="InputFile"> صوره القسم</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="InputFile" name="logo">
                        <label class="custom-file-label" for="InputFile"> صوره القسم</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
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