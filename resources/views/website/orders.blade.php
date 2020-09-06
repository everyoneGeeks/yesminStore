@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/orders.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
@endsection

@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent

<div class="cart-details">
            <div class="container">
                <div class="row">
            

                    @component('components.userInfoDashboardList',['user'=>$user]) @endcomponent

                    
                    <div class="col-md-8">
                        <div class="orders">
                            <h3><img src="{{asset('img/Cart-c.svg')}}" alt="">{{App::getLocale()== 'ar' ? "الطلبات": "Orders"}}</h3>
                            @foreach($orders as $order)
                            <div class="order">
                                <div class="order-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>{{App::getLocale()=='ar' ? "تاريخ الطلب ":"Order placed on"}}: <span> {{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</span></h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6>{{App::getLocale() == 'ar'  ? "طريقة الدفع ": "Payment method"}}: <span>Credit or Debit Cards</span></h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6>{{App::getLocale() == 'ar' ? "رقم الطلب ": "Order ID"}}: <span>#{{$order->order_id}}</span></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-body">
                                @component('components.orderTrackingProgress',['statu'=>$order->status]) @endcomponent
                                    <div class="order-products">
                                    @foreach($order->orderProduct as $product)
                                        <div class="product">
                                            <div class="details">
                                                <img src="{{$product->main_image}}" alt="">
                                                <div class="product-name">
                                                    <h4>{{App::getLocale() == 'ar' ?  $product->name_ar: $product->name_en}}</h4>

                                                    <div class="review">
                                                        <h6>{{App::getLocale() == 'ar' ? " قيم المنتج": "Rate this product"}}:</h6>
                                                  
                                                        <span>
                                                        <label for="recipient-name" class="col-form-label" style="color:#fb8abc">{{App::getLocale() == "ar" ? "التقيم": "rate"}}:</label>
          
                                                        @if($product->rateProduct->where('product_id',$product->id)->where('user_id',Auth::guard('users')->user()->id)->first())

                                                        <form action="/product/update/rate/{{$product->rateProduct->where('product_id',$product->id)->where('user_id',Auth::guard('users')->user()->id)->first()->id}}" method="get">

                                                        <div class="rateYoUpdate"></div>
                                                       <input type="text" hidden   id="updateRate"  name="rateing" value="{{$product->rateProduct->where('product_id',$product->id)->where('user_id',Auth::guard('users')->user()->id)->first()->rate}}">
                                                  
                                                        </span>
                                                        <textarea name="comment" style="margin-bottom:0px;width: 221px;overflow: hidden;" placeholder="اضف اعليق">
                                                        {{$product->rateProduct->where('product_id',$product->id)->where('user_id',Auth::guard('users')->user()->id)->first()->comment}}
                                                      </textarea>
                                                      
                                                        <button style="
                                                            border: 2px solid #97e3f0;
                                                            border-radius: .5rem;
                                                            padding: .5rem;
                                                            margin-top: 1rem;
                                                            color: #4eb9cb;
                                                            font-weight: bold;
                                                            width: 100px;
                                                            float:left;
                                                            background-color: #fff;" 
                                                            type="submit" class="btn btn-primary" 
                                                            
                                                            >{{App::getLocale()== 'ar'  ? ' قيم الان ':"update rate"}}</button>
                                                    </div>
</form>
                                                    @else  
                                                    <form action="/product/rate/{{$product->id}}" method="get">

                                                    <div class="rateYo" data-value="0"></div>
                                                       <input type="text" hidden     name="rateing">
                                                  
                                                        </span>
                                                        <textarea name="comment" style="margin-bottom:0px;width: 221px;overflow: hidden;" placeholder="اضف اعليق">  </textarea>
                                                      
                                                        <button style="
                                                            border: 2px solid #97e3f0;
                                                            border-radius: .5rem;
                                                            padding: .5rem;
                                                            margin-top: 1rem;
                                                            color: #4eb9cb;
                                                            font-weight: bold;
                                                            width: 100px;
                                                            float:left;
                                                            background-color: #fff;" 
                                                            type="submit" class="btn btn-primary" 
                                                            
                                                            >{{App::getLocale()== 'ar'  ? ' قيم الان ':"update rate"}}</button>
                                                    </div>
</form>
                                                    @endif
                                                    <div class="" style="
    width: 317px;
"></div>
                                                </div>

                                                <div>
@if($product->pivot->is_complains !== 1 )
                                                <a href="#" data-toggle="modal" data-target="#exampleModal-add-COMPLAINT-{{$product->id}}-{{$order->id}}" data-whatever="@mdo" class="btn">{{App::getLocale() == 'ar' ?  "تقديم شكوي": "FILE A COMPLAINT"}}</a>
<div class="modal fade" id="exampleModal-add-COMPLAINT-{{$product->id}}-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:#fb8abc">{{App::getLocale() == 'ar' ? "  تقديم الشكوي  " : " FILE A COMPLAINT  "}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
    /* float: right; */
    /* display: flex; */
    margin-left: 0px;
">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/product/complaint/{{$order->id}}/{{$product->id}}" method="get">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" style="color:#fb8abc">{{App::getLocale() == "ar" ? "رقم الهاتف ": "phone"}}:</label>

            <input type="number" class="form-control"  name="phone">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label" style="color:#fb8abc">{{App::getLocale() == "ar" ? "الموضوع ": "subject"}}:</label>
            <textarea class="form-control" id="message-text" style="
    height: 200px;
" name="subject"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{App::getLocale() == 'ar' ? "اغلاق":"Close"}}</button>
        <button type="submit" class="btn btn-primary">{{App::getLocale() == 'ar' ? "حفظ ":"save"}}</button>
        </form>

      </div>
    </div>
  </div>
</div>
@else

<h5 class="alert alert-success" style="
    font-size: 12px;
    font-weight: bold;
">  تم تقديم شكوي سيتم التواصل معك قريبا <h5>
@endif

@if(\Carbon\Carbon::parse($product->created_at)->greaterThan(\Carbon\Carbon::parse($product->created_at)->addDays(14)) == false)
  @if($product->pivot->is_returning !== 1)
<a data-toggle="modal" data-target="#exampleModal-add-returning-{{$product->id}}-{{$order->id}}" data-whatever="@mdo" class="btn">{{App::getLocale() == "ar" ? "استرجاع المنتج " :"RETURN ITEM"}}</a>
                                                    <div class="modal fade" id="exampleModal-add-returning-{{$product->id}}-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:#fb8abc">{{App::getLocale() == 'ar' ? "   استرجاع المنتج   " : " FILE A COMPLAINT  "}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
    /* float: right; */
    /* display: flex; */
    margin-left: 0px;
">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/product/returning/{{$order->id}}/{{$product->id}}" method="get">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" style="color:#fb8abc">{{App::getLocale() == "ar" ? "رقم الهاتف ": "phone"}}:</label>

            <input type="number" class="form-control"  name="phone">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label" style="color:#fb8abc">{{App::getLocale() == "ar" ? "إرسل لنا سبب رغبتك فى إرجاع المنتج وسيتم التواصل معك فى اقرب وقت ممكن  ": "subject"}}:</label>
            <textarea class="form-control" id="message-text" style="
    height: 200px;
" name="subject"></textarea>
          </div>
          <div class="alert alert-danger"> 

          ويرجى قراءة 
          <a href="/delivery/returns">           سياسة الإرجاع  </a>
          قبل تقديم الطلب 
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{App::getLocale() == 'ar' ? "اغلاق":"Close"}}</button>
        <button type="submit" class="btn btn-primary">{{App::getLocale() == 'ar' ? "حفظ ":"save"}}</button>
        </form>

      </div>
    </div>
  </div>
</div>
@else 
<h5 class="alert alert-success" style="
    font-size: 12px;
    font-weight: bold;
">   سيتم التواصل معك قريبا <h5>
@endif
@else 


@endif
                                                </div>
                                            </div>
                                        </div>
                                     
                                    @endforeach    
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('javascript')

<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>
$(function () {
 
 $(".rateYo").rateYo({
   rating: 0,
   normalFill: "#A0A0A0",
   ratedFill: "#fb8abc",
   starWidth: "30px",
     fullStar: true,
     rtl: true

   
 }).on("rateyo.change", function (e, data) {
 
 var rating = data.rating;
 $(this).next().val(rating);
});



});

$(function () {
 var rate=$('.rateYoUpdate').next().val();
$(".rateYoUpdate").rateYo({
   rating: rate,
   normalFill: "#A0A0A0",
   ratedFill: "#fb8abc",
   starWidth: "30px",
   fullStar: true,
   rtl: true



   
 }).on("rateyo.change", function (e, data) {
 
 var rating = data.rating;
 $(this).next().val(rating);
});


});



</script>


@endsection

