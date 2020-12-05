
@extends('layoutDashboard.app',['title'=>'حسابات بنكية'])
@section('content')

@component('components.panel',['subTitle'=>' بيانات  حسابات بنكية'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('https://00a306-qamarwahed-orange.magdsoft.com/'.$bankAccount->image)}}" alt="User profile picture">
                </div>




                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$bankAccount->name_ar}}</span> <b class="float-right">الاسم  العربي  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$bankAccount->name_en}}</span> <b class="float-right">الاسم  بالاجنبي  </b>
                  </li>


                  <li class="list-group-item">
                    <span>{{$bankAccount->account_number}}</span> <b class="float-right">رقم الحساب </b>
                  </li>



                  <li class="list-group-item">
                    <span>{{$bankAccount->person_name}}</span> <b class="float-right">اسم الشخص </b>
                  </li>


                  <li class="list-group-item">
                    <span>{{$bankAccount->ipan}}</span> <b class="float-right">ip  </b>
                  </li>

                  <li class="list-group-item">
                  <span>{{Carbon\Carbon::parse($bankAccount->created_at)->format('Y-m-d H:m a')}}</span> <b class="float-right"> تاريخ الانضمام </b>
                  </li>
                </ul>
                @if($bankAccount->is_active == 1)
                <a  href="/Bank/account/status/{{$bankAccount->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a>
                @else
                <a  href="/Bank/account/status/{{$bankAccount->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a>
                @endif
                <a href="/Bank/account/edit/{{$bankAccount->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a>
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