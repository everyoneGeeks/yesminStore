
@extends('layoutDashboard.app',['title'=>' الشحن'] )
@section('content')

@component('components.panel',['subTitle'=>'  بيانات الشحن'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">





                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$shipping->country->name_ar}}</span> <b class="float-right">الاسم  الدولة   </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$shipping->cities->name_en}}</span> <b class="float-right">الاسم  المدينة   </b>
                  </li>

                  <li class="list-group-item">
                    <span>{{$shipping->cost}}</span> <b class="float-right">  تكلفة الشحن   </b>
                  </li>


                  <li class="list-group-item">
                  <span>{{Carbon\Carbon::parse($shipping->created_at)->format('Y-m-d H:m a')}}</span> <b class="float-right"> تاريخ الانضمام </b>
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