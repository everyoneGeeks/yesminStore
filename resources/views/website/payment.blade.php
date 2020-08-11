@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/payment.css')}}">
@endsection

@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent
<div class="cart-details">
            <div class="container">
                <div class="row">
              
                    <div class="col-md-7">

                    <h2><img src="{{asset('img/Cart-c.svg')}}" alt="">{{App::getLocale() == 'ar' ? "سلة التسوق": "your shopping cart"}}</h2>

                    
                    @component('components.orderProgress',['statu'=>2]) @endcomponent
          
                    
                    <div class="checkout-details">
                            <h6>choose payment method</h6>
                            <div class="payment-method">
                                <div class="content-bar">
                                    <div class="head-bar">
                                        <h3>Pay With PayPal <i class="fa fa-angle-down"></i></h3>
                                    </div>
                                    <div class="bar-content">
                                        PayPal - the safer, easier way to pay.
                                    </div>
                                </div>
                                <div class="content-bar">
                                    <div class="head-bar">
                                        <h3>Pay With 2Checkout<i class="fa fa-angle-down"></i></h3>
                                    </div>
                                    <div class="bar-content">
                                        Pay With 2Checkout
                                    </div>
                                </div>
                                <div class="content-bar">
                                    <div class="head-bar">
                                        <h3>Cash On Delivery<i class="fa fa-angle-down"></i></h3>
                                    </div>
                                    <div class="bar-content">
                                        Cash On Delivery
                                    </div>
                                </div>
                            </div>

                            <div class="proceed row">
                                <div class="col-md-6">
                                    <a href="/checkout" class="btn btn-block back"><i class="fa fa-angle-left"></i> {{App::getLocale() == 'ar' ? "العودة الي الشحن ": "back to shipping"}}</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="/add/order" class="btn btn-block go-proceed"> {{App::getLocale() == 'ar' ? "مراجعة الطلب  ": "review your order"}}  <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                    @component('components.orderSummary',['subtotal'=>$subtotal,'shipping'=>$shipping,'day'=>$day,'taxes'=>$taxes,'discount'=>$discount,'total'=>$allprice]) @endcomponent

                    </div>
                </div>
            </div>
        </div>
@endsection

@section('javascript')



<script>

    
function updateCart(val){
    var id= $(val).attr("data-id");
    if ($('#check_id').is(":checked"))
{
    console.log($('#'+id));
$('#'+id).removeClass("unchecked").addClass("checked");
}else{
    $('#'+id).removeClass("checked").addClass("unchecked");
}
}



</script>

@endsection
