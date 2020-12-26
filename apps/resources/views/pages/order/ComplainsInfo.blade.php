
@extends('layoutDashboard.app',['title'=>'الشكوي'])
@section('content')
@component('components.panel',['subTitle'=>' بيانات العميل '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">



                <ul class="list-group list-group-unbordered mb-3">

 <li class="list-group-item">
                    <span><a href="/admin/user/info/{{$Complains->user->id}}">{{$Complains->user->first_name}}</a></span> <b class="float-right">الاسم  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$Complains->user->email}}</span> <b class="float-right">الايميل </b>
                  </li>
                  <li class="list-group-item">
                  <span>{{$Complains->user->phone}}</span> <b class="float-right">الهاتف </b>
                  </li>
                 <li class="list-group-item">
                  <span>{{$Complains->subject}}</span> <b class="float-right">محتوي الشكوي  </b>
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
      

      
     
@component('components.panel',['subTitle'=>'  الطلب '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$Complains->order->order_id}}</span> <b class="float-right">رقم الطلب   </b>
                  </li>
                 
                  <li class="list-group-item">
                    <span>{{$Complains->order->price}}</span> <b class="float-right">  اجمالي السعر  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$Complains->order->discount}}</span> <b class="float-right">  اجمالي الخصم  %  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$Complains->order->discount_code}}</span> <b class="float-right">    كود الخصم  </b>
                  </li>
                  

                  <li class="list-group-item">
                    <span>{{$Complains->order->payment_method}}</span> <b class="float-right">  وسبلة الدفع  </b>
                  </li>

   
                  <li class="list-group-item">
                    <span>{{$Complains->order->shipping->cities->name_ar }},{{$Complains->order->address->street_name }},{{$Complains->order->address->building_name }}, عمارة رقم {{$Complains->order->address->floor }}</span> <b class="float-right">   عنوان الشحن   </b>
                  </li>


                  <li class="list-group-item">
                  <span>{{Carbon\Carbon::parse($Complains->order->created_at)->format('Y-m-d H:m a')}}</span> <b class="float-right"> تاريخ الانضمام </b>
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



  @component('components.panel',['subTitle'=>'المنتجات '])

  <div class="container-fluid">
        <div class="row">
        @foreach($Complains->order->products as $product)
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-fluid " width="150px" height="150px"  style="margin-bottom:50px"src="{{asset($product->product->main_image)}}" alt="User profile picture">
                </div>



                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span><a href="/admin/product/info/{{$product->product->id}}"> {{$product->product->name_ar}} </a> </span> <b class="float-right">الاسم    </b>
                  </li>

                  <li class="list-group-item">
                  <b class="float-right">الوصف    </b>
                    <span>{{$product->product->description_ar}}</span> 
                  </li>

                  @if($product->character !==null)
                  <li class="list-group-item">
               <span>{{$product->character->name_ar}}  </span> <b class="float-right">  الشخصية   </b>
                  </li>
                  @endif

                  @if($product->occasion !== null ) 
                  <li class="list-group-item">
                <span>{{$product->occasion->name_ar}}  </span> <b class="float-right">  المناسبة   </b>
                  </li>
                  @endif


                  @if($product->party_theme !==null )
                  <li class="list-group-item"><span>{{$product->party_theme->name_ar}}  </span> <b class="float-right">  نوع الحفل    </b>
                  </li>
                  @endif


                  @if($product->size !==null)
                  <li class="list-group-item">
                     <span>{{$product->size->name_ar}}  </span> <b class="float-right">  الحجم    </b>
                  </li>
                  @endif


     

                  <li class="list-group-item">
                    <span>{{$product->price}}</span> <b class="float-right">  السعر   </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$product->amount}}</span> <b class="float-right">  الكمية    </b>
                  </li>

                  <li class="list-group-item">
                    <span>{{$product->discount}}</span> <b class="float-right">  نسبة الخصم  </b>
                  </li>


@if($product->personalize)
<hr>
<p> اضافة الطابع الشخصي </p>
                  <li class="list-group-item">
                    <span>{{$product->child_name}}</span> <b class="float-right">     </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$product->child_age}}</span> <b class="float-right">  الكمية    </b>
                  </li>


@endif
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
         
         
  
  
  
  
  
  
  
  
          </div>
        @endforeach
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>



@endcomponent
 @endsection