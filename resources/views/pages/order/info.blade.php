
@extends('layoutDashboard.app',['title'=>'الطلبات'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
@component('components.panel',['subTitle'=>' ادارة الطلبات'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$order->order_id}}</span> <b class="float-right">رقم الطلب   </b>
                  </li>
                 
                  <li class="list-group-item">
                    <span><a href="/admin/user/info/{{$order->user_id}}">{{$order->user->first_name}} </a> </span> <b class="float-right">  العميل   </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$order->price}}</span> <b class="float-right">  اجمالي السعر  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$order->discount}}</span> <b class="float-right">  اجمالي الخصم  %  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$order->discount_code}}</span> <b class="float-right">    كود الخصم  </b>
                  </li>
                  <li class="list-group-item">
                    <span>
                      @if($order->status == 'new')
                      جديد
                      @elseif($order->status == 'inprogress')
                      قيد التنفيذ
                      @elseif($order->status == 'delivered')
                      تم التوصيل
                      @endif
                    </span> <b class="float-right">  حالة الطلب   </b>
                  </li>

                  <li class="list-group-item">
                    <span>{{$order->payment_method}}</span> <b class="float-right">  وسبلة الدفع  </b>
                  </li>

   

                  <li class="list-group-item">
                    <span>{{$order->shipping->cost }}</span> <b class="float-right">   تكلفة الشحن   </b>
                  </li>
                  <li class="list-group-item">
                    <span>مصر </span> <b class="float-right">   دولة   الشحن  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$order->shipping->cities->name_ar }}</span> <b class="float-right">  مدينة الشحن   </b>
                  </li>

                  <li class="list-group-item">
                  <span>{{Carbon\Carbon::parse($order->created_at)->format('Y-m-d H:m a')}}</span> <b class="float-right"> تاريخ الانضمام </b>
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

   @component('components.panel',['subTitle'=>'الشحن'])

  <div class="container-fluid">
        <div class="row">
  
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
      



                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$order->address->first_name}}</span> <b class="float-right">الاسم الاول   </b>
                  </li>

                  <li class="list-group-item">
                    <span>{{$order->address->last_name}}</span> <b class="float-right">الاسم الاخير    </b>
                  </li>


                  <li class="list-group-item">
                    <span>{{$order->address->country->name_ar}}</span> <b class="float-right">الدولة     </b>
                  </li>


                  <li class="list-group-item">
                    <span>{{$order->address->city->name_ar}}</span> <b class="float-right"> المدينة    </b>
                  </li>


     

                  <li class="list-group-item">
                    <span>{{$order->address->street_name}}</span> <b class="float-right"> اسم الشارع    </b>
                  </li>



                  <li class="list-group-item">
                    <span>{{$order->address->building_name}}</span> <b class="float-right"> رقم العقار    </b>
                  </li>

                  <li class="list-group-item">
                    <span>{{$order->address->floor}}</span> <b class="float-right"> رقم الدور    </b>
                  </li>


                  <li class="list-group-item">
                    <span>{{$order->address->apartment}}</span> <b class="float-right"> رقم   الشقة    </b>
                  </li>


                  <li class="list-group-item">
                    <span>{{$order->address->nearest}}</span> <b class="float-right"> أقرب علامة مميزة    </b>
                  </li>

                  <li class="list-group-item">
                    <span>{{$order->address->location}}</span> <b class="float-right"> نوع الموقع   </b>
                  </li>


                  <li class="list-group-item">
                    <span>{{$order->address->phone_number}}</span> <b class="float-right"> رقم الهاتف   </b>
                  </li>


                  <li class="list-group-item">
                    <span>{{$order->address->additional_phone_number}}</span> <b class="float-right"> رقم هاتف اختياري    </b>
                  </li>


                  <li class="list-group-item">
                    <span>{{$order->address->shipping_note}}</span> <b class="float-right">ملاحظات الشحن    </b>
                  </li>



                  <li class="list-group-item">
                    <span>{{$order->address->address_name}}</span> <b class="float-right"> اسم العنوان   </b>
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
        @foreach($order->products as $product)
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

 @section('javascript')
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- page script -->
<script>
  $(function () {

    $('#example2').DataTable({
        "language": {
            "paginate": {
                "next": "بعد",
                "previous" : "قبل"
            }
        },
      "info" : true,
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "autoWidth": false
    });
  });
</script>
 @endsection
