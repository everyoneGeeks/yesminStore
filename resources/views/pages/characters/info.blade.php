
@extends('layoutDashboard.app',['title'=>'شخصيات كرتونية '] )
@section('content')

@component('components.panel',['subTitle'=>'   شخصيات كرتونية  '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">

                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$characters->name_ar}}</span> <b class="float-right">الاسم  العربي  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$characters->name_en}}</span> <b class="float-right">الاسم  بالاجنبي  </b>
                  </li>

                  <li class="list-group-item">
                  <span>{{Carbon\Carbon::parse($characters->created_at)->format('Y-m-d H:m a')}}</span> <b class="float-right"> تاريخ الانضمام </b>
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