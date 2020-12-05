
@extends('layoutDashboard.app',['title'=>' المنتجات'] )
@section('content')

@component('components.panel',['subTitle'=>'    بيانات المنتج'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-fluid " width="150px" height="150px"  style="margin-bottom:50px"src="{{asset($product->main_image)}}" alt="User profile picture">
                </div>



                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$product->name_ar}}</span> <b class="float-right">الاسم  العربي  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$product->name_en}}</span> <b class="float-right">الاسم  بالاجنبي  </b>
                  </li>

                  <li class="list-group-item">
                  <b class="float-right">الصوف  العربي  </b>
                    <span>{{$product->description_ar}}</span> 
                  </li>
                  <li class="list-group-item">
                  <b class="float-right">الوصف  بالاجنبي  </b>
                    <span>{{$product->description_en}}</span> 
                  </li>

                  @if(!$product->character->isEmpty())
                  <li class="list-group-item">
                 @foreach($product->character as $character) <span>{{$character->name_ar}} , </span>@endforeach <b class="float-right">  الشخصية   </b>
                  </li>
                  @endif

                  @if(!$product->occasion->isEmpty())
                  <li class="list-group-item">
                 @foreach($product->occasion as $occasion) <span>{{$occasion->name_ar}} , </span>@endforeach <b class="float-right">  المناسبة   </b>
                  </li>
                  @endif


                  @if(!$product->party_theme->isEmpty())
                  <li class="list-group-item">
                 @foreach($product->party_theme as $party_theme) <span>{{$party_theme->name_ar}} , </span>@endforeach <b class="float-right">  نوع الحفل    </b>
                  </li>
                  @endif


                  @if(!$product->size->isEmpty())
                  <li class="list-group-item">
                 @foreach($product->size as $size) <span>{{$size->name_ar}} , </span>@endforeach <b class="float-right">  الحجم    </b>
                  </li>
                  @endif


                  @if($product->url !== null)
                  <li class="list-group-item">
                       <span>             <iframe width="420" height="300" src="{{$product->url}}">
                                </iframe></span> <b class="float-right">  فيديو     </b>
                  </li>
                  @endif

     

                  <li class="list-group-item">
                    <span>{{$product->price}}</span> <b class="float-right">  السعر   </b>
                  </li>

                  <li class="list-group-item">
                    @if($product->amount == 0)
                    <span class="alert-danger"> لا توجد كمية متاحة     </span>
                    @else 
                    <span>  {{$product->amount}}    </span>
                    @endif
                
                  <b class="float-right">  الكمية   </b>
                  </li>


                  <li class="list-group-item">
                    <span>{{$product->discount}}</span> <b class="float-right">  نسبة الخصم  </b>
                  </li>


                  <li class="list-group-item">
                    <span><a href="/admin/category/info/{{$product->category->id}}">{{$product->category->name_ar}}</a></span> <b class="float-right">  القسم   الرائيسي </b>
                  </li>

                  <li class="list-group-item">
                    <span><a href="/admin/subcategory/info/{{$product->subcategory->id}}">{{$product->subcategory->name_ar}}</a></span> <b class="float-right">  القسم  الفرعي  </b>
                  </li>

                  <li class="list-group-item">
                  <span>{{Carbon\Carbon::parse($product->created_at)->format('Y-m-d H:m a')}}</span> <b class="float-right"> تاريخ الانضمام </b>
                  </li>


                </ul>
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



      @component('components.panel',['subTitle'=>' صور المنتج'])


<div class="col-lg-12">
@foreach($product->images as $images)

<div class="col-lg-3" style="display:inline-block">
<div class="thumbnail">
  <img src="{{$images->image}}" alt="..." width="150px" height="150px">
  <div class="caption">
    </form>
  </div>
</div>
</div>

@endforeach
</div>

  @endcomponent

 @endsection