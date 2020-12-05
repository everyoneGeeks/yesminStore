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
                                <div class= 'col-lg-6'>
                                <input type="radio" name="payment" id="fawery" style="
    position: relative;
">
                                <img id="faweryImag" src="{{asset('img/fawry.svg')}}"/ style="
    width: 150px;
    height: 150px;
">
                               <input hidden='true'  id="faweryInput" type="image" onclick="FawryPay.checkout(chargeRequest,'/add/order', '/error')"; src="https://www.atfawry.com/assets/img/FawryPayLogo.jpg"/>
                            </div>
                              <br>
                              
<!--                              <div class="col-lg-6">-->
<!--                                <input type="radio" name="payment" id="paypal" style="-->
<!--    position: relative;-->
<!--">-->
<!--                             <img id="paypalImage" src="{{asset('img/paypal.svg')}}" -->
<!--                              style="-->
<!--    width: 150px;-->
<!--    height: 150px;-->
<!--"/> -->

<!--                                <div hidden id="paypal-button-container"></div> -->
                              
<!--                           </div>   -->
                           
                                <!--<br>-->
                                <div class="col-lg-6">
                                <input type="radio" name="payment" id="cash">
                                <img id="cash" src="{{asset('img/cash.svg')}}" 
                              style="
    width: 150px;
    height: 150px;
"/>
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

    

$( "#fawery" ).on( "click", function() {
    
   $('#faweryImag').attr('hidden','true');
   $('#faweryInput').removeAttr('hidden');
   $('#paypalImage').removeAttr('hidden');
   $('#paypal-button-container').attr('hidden');
});


$( "#paypal" ).on( "click", function() {
    
  $('#faweryImag').removeAttr('hidden');
   $('#faweryInput').attr('hidden','true');
   
   $('#paypalImage').attr('hidden','true');
   $('#paypal-button-container').removeAttr('hidden');
    
});



$( "#cash" ).on( "click", function() {
    
  $('#faweryImag').removeAttr('hidden');
   $('#faweryInput').attr('hidden','true');
   
   $('#paypalImage').removeAttr('hidden');
   $('#paypal-button-container').attr('hidden','true');
    
});


cash


</script>


    
<script src= "https://atfawry.fawrystaging.com/ECommercePlugin/scripts/V2/FawryPay.js"></script>


	<script>
	
 
	 
		var chargeRequest = {};
		chargeRequest.language= 'eg-ar';
		chargeRequest.merchantCode= '1tSa6uxz2nQDrSCUSJ7b9w==';
		chargeRequest.merchantRefNumber= '18655';
		chargeRequest.customer = {}
		chargeRequest.customer.name = '{{$user->first_name}} {{$user->last_name}}';
		chargeRequest.customer.mobile = '{{$user->phone}}';
		chargeRequest.customer.email = '{{$user->email}}';
		chargeRequest.customer.customerProfileId = '';
		chargeRequest.order = {};
		chargeRequest.order.description = '';
		chargeRequest.order.expiry = '';
		chargeRequest.order.orderItems = [];
		
			@foreach($cart as $product)
				var item = {};
			item.productSKU = '{{$product->id}}';
			item.description ='{{$product->product->name_ar}}';
			item.price ='{{$product->price-($product->price*$product->discount/100)}}';
			item.quantity ='{{$product->amount}}';
			item.width ='12222';
			item.height ='12222';
			item.length ='12222';
			item.weight ='12222';
		chargeRequest.order.orderItems.push(item);
		@endforeach


		 
		function requestCanceldCallBack(merchantRefNum) {		 
		alert(merchantRefNum);		 
		}
		
		function fawryCallbackFunction(paid, billingAcctNum, paymentAuthId,merchantRefNum, messageSignature) {
			// Your implementation
		}
	</script>
	
	
	

 <script   data-namespace="paypal_sdk" src="https://www.paypal.com/sdk/js?client-id=AXySesp-fiIMXF_N5o60f4ttT8yZz-szCz7Wkc1d7ihLKWHoBPfzaZj1VCCA7zBl2O1Edgcr309AOEyL&currency=USD"></script>

    <script>

        paypal_sdk.Buttons({
            style: {
             layout: 'horizontal'
            }
        }).render('#paypal-button-container');
        
    </script>
@endsection
