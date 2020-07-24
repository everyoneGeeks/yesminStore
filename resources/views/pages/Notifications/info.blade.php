
@extends('layoutDashboard.app',['title'=>' الاشعارات'])
@section('content')

@component('components.panel',['subTitle'=>' تعديل  الاشعارات'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">

                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$Notification->content_ar}}</span> <b class="float-right">الاشعار  العربي  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$Notification->content_en}}</span> <b class="float-right">الاشعار  بالاجنبي  </b>
                  </li>

                </ul>
  
                <a href="/Notification/edit/{{$Notification->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a>
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