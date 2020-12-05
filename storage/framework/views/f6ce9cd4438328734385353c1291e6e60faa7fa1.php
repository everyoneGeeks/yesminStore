<div class="cart-summary">
                            <h4><?php echo e(App::getLocale() == 'ar' ? 'ملخص الطلب ' : 'order summary'); ?></h4>
                            <div class="total-summary">
                                <p><?php echo e(App::getLocale() == 'ar' ? "سعر الطلب  ": "subtotal"); ?>: <span>EGP<?php echo e($subtotal); ?></span></p>
                                <p><?php echo e(App::getLocale() == 'ar' ? " الشحن  ": "shipping"); ?>: <span id='Shipping'>EGP <?php echo e($shipping); ?></span></p>
                                <p><?php echo e(App::getLocale() == 'ar' ? " الخصم": "discount"); ?>: <span>EGP <?php echo e($discount); ?></span></p><hr>
                                <p class="total"><?php echo e(App::getLocale() == 'ar' ? " السعر الكلي ": "total"); ?><span id='TotalPrice' data-total="<?php echo e($total); ?>">EGP <?php echo e($total); ?></span></p>
                                <!-- <a href="checkout.html" class="btn btn-block btn-summary">Proceed to checkout</a> -->
                            </div>
                            
                            <?php if($discount == 0 ): ?>
                            <div class="coupon">
                                <div class="acco-header">
                                    <h4><?php echo e(App::getLocale() == 'ar' ? " الخصم ": "Purchase Coupon"); ?></h4>
                                </div>
                                <div class="acco-body">
                           <form action="/add/coupon/" method="get">
                                    <input type="text" id="coupon" name="coupon">
                                    <button type="submit"  class="btn btn-block btn-summary"><?php echo e(App::getLocale() == 'ar' ? " اضافة كود الخصم  ": "Apply Coupon"); ?></button>
                                </div>
                            </div>
                        <?php endif; ?>
                        </div>

