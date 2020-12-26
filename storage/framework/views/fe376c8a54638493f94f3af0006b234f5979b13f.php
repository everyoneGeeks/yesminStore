<?php $__env->startSection('content'); ?>

                <!-- Slider Section -->
                <div class="slider top-slider" style="height:auto;">
                    <div class="container" style="height: inherit;">
                        <div id="Adscarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                            <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($loop->count > $loop->index ): ?>
                                <?php if($loop->first): ?>
                                    <li data-target="#Adscarousel" data-slide-to="0" class="active"></li>
                                <?php else: ?>
                                <li data-target="#Adscarousel" data-slide-to="<?php echo e($loop->index); ?>"></li>
                                <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                            </ol>
                            <div class="carousel-inner">
                            <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->first): ?>
                                <div class="carousel-item active">
                                    <img src="<?php echo e($ad->image); ?>"  alt="...">
                                </div>
                            <?php else: ?>
                                <div class="carousel-item ">
                                    <img src="<?php echo e($ad->image); ?>"  alt="...">
                                </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </header>
<!-- services Section -->
<div class="services" style="
    margin-bottom: 10px;
">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="service" style="height:92%">
                                <img style="margin-bottom: 15px;margin-top: 15px" src="<?php echo e(asset('img/customer-services.svg')); ?>" alt="">
                                <h5 style="<?php echo e(\App::getLocale() == 'ar' ? " " : 'font-weight: bold;font-size: 24px;margin-bottom: 19px;text-transform: capitalize;font-family: inherit;'); ?>"><?php echo e(App::getLocale() == 'ar' ?   "خدمة عملاء
": "customer service"); ?></h5>
                                <p style="font-size: 18px;font-weight: bold;color: #fb8abc;padding-top: 0px;padding-bottom: 28px;"><?php echo e(App::getLocale() == 'ar' ? "يسعدنا تقديم المساعدة والدعم
  لك حتى تحصل على طلبك": "You will get support and help to get your order"); ?></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="service" style="height:92%">
                                <img  style="margin-bottom: 15px;margin-top: 15px" src="<?php echo e(asset('img/VIDEO-TUTORIAL.svg')); ?>" alt="">
                                <h5 style="<?php echo e(\App::getLocale() == 'ar' ? " " : 'font-weight: bold;font-size: 24px;margin-bottom: 19px;text-transform: capitalize;font-family: inherit;'); ?>"> <?php echo e(App::getLocale() == 'ar' ?   "  فديوهات شرح
": "video tutorial"); ?></h5>
                                <p style="font-size: 18px;font-weight: bold;color: #fb8abc;padding-top: 0px;padding-bottom: 28px;"><?php echo e(App::getLocale() == 'ar' ? "نقدم لك فديوهات شرح طريقة إستخدام منتجاتنا
": "We explain to you how to use our products"); ?></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="service" style="height:92%">
                                <img  style="margin-bottom: 15px;margin-top: 15px" src="<?php echo e(asset('img/DELIVER-ON-TIME.svg')); ?>" alt="" class="deliver">
                                <h5 style="<?php echo e(\App::getLocale() == 'ar' ? " " : 'font-weight: bold;font-size: 24px;margin-bottom: 19px;text-transform: capitalize;font-family: inherit;'); ?>"><?php echo e(App::getLocale() == 'ar' ?   "الشحن فى الموعد
": "deliver on time"); ?></h5>
                                <p style="font-size: 18px;font-weight: bold;color: #fb8abc;padding-top: 0px;padding-bottom: 28px;"><?php echo e(App::getLocale() == 'ar' ? "نقوم بتوصيل طلبك فى الموعد المحدد 
": "We deliver your order on time"); ?></p>

                        
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="service" style="height:92%">
                                <img style="margin-bottom: 15px;margin-top: 15px" src="<?php echo e(asset('img/MANY-PAYMENT-OPTIONS.svg')); ?>" alt="">
                                <h5 style="<?php echo e(\App::getLocale() == 'ar' ? " " : 'font-weight: bold;font-size: 24px;margin-bottom: 19px;text-transform: capitalize;font-family: inherit;'); ?>" ><?php echo e(App::getLocale() == 'ar' ?   "طرق دفع متعددة": "many payment options"); ?></h5>
                                <p style="font-size: 18px;font-weight: bold;color: #fb8abc;padding-top: 0px;padding-bottom: 28px;"><?php echo e(App::getLocale() == 'ar' ? "نوفر لك العديد من وسائل
 الدفع المحلية و العالمية": "We offer many local and international payment methods"); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- customer pictures section -->
            <div class="slider pic">
                <div class="container">
                    <div id="costomerPhoto" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                        <?php $__currentLoopData = $costomerPhoto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($loop->count > $loop->index ): ?>
                                <?php if($loop->first): ?>
                                    <li data-target="#costomerPhoto" data-slide-to="0" class="active"></li>
                                <?php else: ?>
                                <li data-target="#costomerPhoto" data-slide-to="<?php echo e($loop->index); ?>"></li>
                                <?php endif; ?>
                                <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                        </ol>
                        <div class="carousel-inner">
                        <?php $__currentLoopData = $costomerPhoto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->first): ?>
                                <div class="carousel-item active">
                                    <img src="<?php echo e($photo->image); ?>"  width="850px" height="650px" alt="...">
                                </div>
                            <?php else: ?>
                                <div class="carousel-item ">
                                    <img src="<?php echo e($photo->image); ?>" width="850px" height="650px" alt="...">
                                </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- customer reviews section -->
            <div class="slider rev">
                <div class="container">
                    <div id="costomerRate" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                        <?php $__currentLoopData = $costomerRate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($loop->count > $loop->index): ?>
                                <?php if($loop->first): ?>
                                    <li data-target="#costomerRate" data-slide-to="0" class="active"></li>
                                <?php else: ?>
                                <li data-target="#costomerRate" data-slide-to="<?php echo e($loop->index); ?>"></li>
                                <?php endif; ?>
                                <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                        </ol>
                        <div class="carousel-inner">
                        <?php $__currentLoopData = $costomerRate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->first): ?>
                                <div class="carousel-item active">
                                    <img src="<?php echo e($photo->image); ?>"  width="850px" height="650px" alt="...">
                                </div>
                            <?php else: ?>
                                <div class="carousel-item ">
                                    <img src="<?php echo e($photo->image); ?>" width="850px" height="650px" alt="...">
                                </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Party Supplies (Top selling items )-->
            <div class="product-cards">
                <div class="container" >
                    <h4><?php echo e(App::getLocale() == 'ar' ? "الأكثر مبيعاً   ( زينة الحفلات  ) ": "TOP SELLING ITEMS ( PARTY SUPPLIES )"); ?></h4>
                    <div class="top-selling">   
                    <?php $__currentLoopData = $topSellingProductParty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__env->startComponent('components.product',['product'=>$product]); ?> <?php echo $__env->renderComponent(); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>  
                </div>
            </div>

            <!-- Party Supplies (Top selling items )-->
            <div class="product-cards">
                <div class="container" >
                <h4><?php echo e(App::getLocale() == 'ar' ? "الأكثر مبيعاً ( أدوات الكيك ) ": "TOP SELLING ITEMS ( CAKE TOOLS )"); ?></h4>

                    <div class="top-selling">   
                    <?php $__currentLoopData = $topSellingProductCake; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__env->startComponent('components.product',['product'=>$product]); ?> <?php echo $__env->renderComponent(); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>  
                </div>
            </div>

        </div>


<?php $__env->stopSection(); ?>




<?php echo $__env->make('layoutWebsite.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>