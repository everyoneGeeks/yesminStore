<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/payment.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.Websiteerror',['errors'=>$errors ?? NULL]); ?> <?php echo $__env->renderComponent(); ?>
<div class="cart-details">
            <div class="container">
                <div class="row">
              
                    <div class="col-md-7">

                    <h2><img src="<?php echo e(asset('img/Cart-c.svg')); ?>" alt=""><?php echo e(App::getLocale() == 'ar' ? "سلة التسوق": "your shopping cart"); ?></h2>

                    
                    <?php $__env->startComponent('components.orderProgress',['statu'=>2]); ?> <?php echo $__env->renderComponent(); ?>
          
                    
                    <div class="checkout-details">
                            <h6>choose payment method</h6>
                            


                            <div class="payment-method">
                                <div class= 'col-lg-6'>
                                <input type="radio" name="payment" id="fawery" style="
    position: relative;
">
                                <img id="faweryImag" src="<?php echo e(asset('img/fawry.svg')); ?>"/ style="
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
<!--                             <img id="paypalImage" src="<?php echo e(asset('img/paypal.svg')); ?>" -->
<!--                              style="-->
<!--    width: 150px;-->
<!--    height: 150px;-->
<!--"/> -->

<!--                                <div hidden id="paypal-button-container"></div> -->
                              
<!--                           </div>   -->
                           
                                <!--<br>-->
                                <div class="col-lg-6">
                                <input type="radio" name="payment" id="cash">
                                <img id="cash" src="<?php echo e(asset('img/cash.svg')); ?>" 
                              style="
    width: 150px;
    height: 150px;
"/>
                                </div>
                            </div>

                            <div class="proceed row">
                                <div class="col-md-6">
                                    <a href="/checkout" class="btn btn-block back"><i class="fa fa-angle-left"></i> <?php echo e(App::getLocale() == 'ar' ? "العودة الي الشحن ": "back to shipping"); ?></a>
                                </div>
                                <div class="col-md-6">
                                    <a href="/add/order" class="btn btn-block go-proceed"> <?php echo e(App::getLocale() == 'ar' ? "مراجعة الطلب  ": "review your order"); ?>  <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                    <?php $__env->startComponent('components.orderSummary',['subtotal'=>$subtotal,'shipping'=>$shipping,'day'=>$day,'taxes'=>$taxes,'discount'=>$discount,'total'=>$allprice]); ?> <?php echo $__env->renderComponent(); ?>

                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>



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
		chargeRequest.customer.name = '<?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>';
		chargeRequest.customer.mobile = '<?php echo e($user->phone); ?>';
		chargeRequest.customer.email = '<?php echo e($user->email); ?>';
		chargeRequest.customer.customerProfileId = '';
		chargeRequest.order = {};
		chargeRequest.order.description = '';
		chargeRequest.order.expiry = '';
		chargeRequest.order.orderItems = [];
		
			<?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				var item = {};
			item.productSKU = '<?php echo e($product->id); ?>';
			item.description ='<?php echo e($product->product->name_ar); ?>';
			item.price ='<?php echo e($product->price-($product->price*$product->discount/100)); ?>';
			item.quantity ='<?php echo e($product->amount); ?>';
			item.width ='12222';
			item.height ='12222';
			item.length ='12222';
			item.weight ='12222';
		chargeRequest.order.orderItems.push(item);
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


		 
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutWebsite.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>