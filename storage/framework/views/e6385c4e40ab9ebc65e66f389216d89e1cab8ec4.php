<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/order-tracking.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.Websiteerror',['errors'=>$errors ?? NULL]); ?> <?php echo $__env->renderComponent(); ?>
<div class="order-tracking cart-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2><img src="<?php echo e(asset('img/Shipping.svg')); ?>" alt=""><?php echo e(App::getLocale() == 'ar' ?  "":"Track Your Order"); ?></h2>
                        <?php $__env->startComponent('components.orderProgress',['statu'=>3]); ?> <?php echo $__env->renderComponent(); ?>
                        <div class="right-msg">
                            <img src="<?php echo e(asset('img/Right (sign).svg')); ?>" alt="">
                            <h3>
                            <?php echo e(App::getLocale() == 'ar' ? "تم إكمال طلبك بنجاح يمكنك تتبع طلبك الآن"
                            :"Your order has been successfully completed You can track your order now"); ?>

      
                            </h3>
                        </div>
                        <div class="orders">

                        <?php $__env->startComponent('components.orderTrackingProgress',['statu'=>0]); ?> <?php echo $__env->renderComponent(); ?>

<?php $__currentLoopData = $orderPrduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                            <div class="product-cart-details">
                                <div class="img-section">
                                    <img src="<?php echo e($product->product->main_image); ?>" alt="">
                                    <div>
                                        <a href="/product/info/<?php echo e($product->product->id); ?>"><?php echo e(App::getLocale() == 'ar' ?  $product->product->name_ar: $product->product->name_en); ?></a>
                                        <div class="price">
                                    <?php if($product->discount !== 0 ): ?>
                                    <span class="aft-dis">EGP <?php echo e($product->product->price - $product->product->price*$product->product->discount/100); ?></span>
                                    <span class="bef-dis">EGP <?php echo e($product->product->price); ?></span>
                                    <span class="discount"><?php echo e($product->product->discount); ?>% </span>
                                    <?php else: ?> 
                                    <span class="aft-dis">EGP <?php echo e($product->product->price); ?></span>
                                    <?php endif; ?>
                                </div><hr>


                                <?php if($product->character): ?>
                                    <div class="character">
                                        <h5><?php echo e(App::getLocale() == 'ar' ? "الروسومات": "characters"); ?>: <span><?php echo e(App::getLocale() == 'ar' ? $product->character->name_ar:$product->character->name_en); ?></span></h5>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($product->occasion): ?>
                                    <div class="character">
                                        <h5><?php echo e(App::getLocale() == 'ar' ? "المناسبة": "occasion"); ?>: <span><?php echo e(App::getLocale() == 'ar' ? $product->occasion->name_ar:$product->occasion->name_en); ?></span></h5>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($product->party_theme): ?>
                                    <div class="character">
                                        <h5><?php echo e(App::getLocale() == 'ar' ? "نوع الحفلة ": "party_theme"); ?>: <span><?php echo e(App::getLocale() == 'ar' ? $product->party_theme->name_ar:$product->party_theme->name_en); ?></span></h5>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($product->size): ?>
                                    <div class="size">
                                        <h5><?php echo e(App::getLocale() == 'ar' ? "الحجم": "size"); ?>: <span><?php echo e(App::getLocale() == 'ar' ? $product->size->name_ar:$product->size->name_en); ?></span></h5>
                                    </div>
                                    <?php endif; ?>

                                    <div class="quantity">
                                        <h5> <?php echo e(App::getLocale() == 'ar' ? "الكمية": "QUANTITY"); ?> : <span><?php echo e($product->amount); ?></span></h5>
                                    </div>
                                        
                                    
                                    </div>
                                <?php if($product->personalize): ?>
                                    <div class="personalize">
                                        <h5><?php echo e(App::getLocale() == 'ar' ? "اسم الطفل ":"Child Name"); ?>: <br><span><?php echo e($product->child_name); ?></span></h5>
                                        <h5><?php echo e(App::getLocale() == 'ar' ? "عمر الطفل ":"Child Age"); ?>: <br><span><?php echo e($product->child_age); ?></span></h5>
                                    </div>
                                <?php endif; ?>    
                                </div>
                            </div><hr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="shipping-address">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5><?php echo e(App::getLocale() =='ar' ? "الشحن الي " : "Shipping to"); ?>:</h5>
                                    <p><?php echo e(App::getLocale() == 'ar' ? "العميل ":"Client"); ?>: <span><?php echo e($orders->user->first_name); ?> <?php echo e($orders->user->last_name); ?></span></p>
                                    <p><?php echo e(App::getLocale() == 'ar' ? "العنوان ":"Address"); ?>: <span><?php echo e($orders->shipping->cities->name_en); ?></span></p>
                                    <p><?php echo e(App::getLocale() == 'ar' ? "الهاتف ":"Phone"); ?>: <?php echo e($orders->user->phone); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <h5><?php echo e(App::getLocale() == 'ar' ? "طرق الدفع": "Payment method"); ?>:</h5>
                                    <p><?php echo e(App::getLocale() == 'ar' ? " باي بال": "PayPal"); ?>: *************</p>
                                    <h5><?php echo e(App::getLocale() == 'ar' ? "  اجمالي الطلب ": "Total amount"); ?>:</h5>
                                    <p>EGP <?php echo e($orders->price); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cart-summary">
                        <h4><?php echo e(App::getLocale() == 'ar' ? 'ملخص الطلب ' : 'order summary'); ?></h4>
                            
                            <div class="total-summary">
                                <p><?php echo e(App::getLocale() == 'ar' ? "سعر الطلب  ": "subtotal"); ?>: <span>EGP <?php echo e($orders->price); ?></span></p>
                                <p><?php echo e(App::getLocale() == 'ar' ? " الشحن  ": "shipping"); ?> : <span>EGP <?php echo e($orders->shipping->cost); ?></span></p>
                                <p><?php echo e(App::getLocale() == 'ar' ? " الضرائب": "taxes"); ?>: <span>EGP <?php echo e(\App\websiteSetting::find(1)->Taxes); ?></span></p>
                                <p><?php echo e(App::getLocale() == 'ar' ? " الخصم": "discount"); ?>: <span>EGP <?php echo e($orders->discount); ?></span></p><hr>
                                <p class="total"><?php echo e(App::getLocale() == 'ar' ? " السعر الكلي ": "total"); ?><span>EGP <?php echo e($orders->price); ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

age

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutWebsite.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>