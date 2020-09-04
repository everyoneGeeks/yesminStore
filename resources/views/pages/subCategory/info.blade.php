
@extends('layoutDashboard.app',['title'=>'الاقسام الفرعية'] )
@section('content')

@component('components.panel',['subTitle'=>'  بيانات القسم  الفرعي'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-fluid " width="150px" height="150px" src="{{asset($subCategory->image)}}" alt="User profile picture">
                </div>




                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$subCategory->name_ar}}</span> <b class="float-right">الاسم  العربي  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$subCategory->name_en}}</span> <b class="float-right">الاسم  بالاجنبي  </b>
                  </li>

                  <li class="list-group-item">
                    <span><a href="/admin/category/info/{{$subCategory->category->id}}">{{$subCategory->category->name_ar}}</a></span> <b class="float-right">  القسم   </b>
                  </li>

                  <li class="list-group-item">
                  <span>{{Carbon\Carbon::parse($subCategory->created_at)->format('Y-m-d H:m a')}}</span> <b class="float-right"> تاريخ الانضمام </b>
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


 @endsection