<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/shop.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

        <div class="cart-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">

                        <div class="cart-summary shop-sidebar">
                            <div class="categories">
                                <div class="content-bar">
                                    <div  id="collapseOne" class="collapse show head-bar"  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                                        <h3><?php echo e(App::getLocale() == 'ar' ? "الاقسام" : "Category"); ?><i class="fa fa-angle-down"></i></h3>
                                    </div>
                                    <div class="bar-content collapse show" id="collapseExample">
                                        <ul class="list-unstyled">
                                            <li class=""><a href="/products"><?php echo e(App::getLocale() == 'ar' ? "عرض الكل " : "View all"); ?></a><span><?php echo e($AllProducts->count()); ?></span></li>
                                            <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><a href="/products/<?php echo e($subCategory->id); ?>">  <?php echo e(App::getLocale() == 'ar' ? $subCategory->name_ar : $subCategory->name_en); ?></a><span><?php echo e($AllProducts->where('sub_category_id',$subCategory->id)->count()); ?></span></li>
                                   
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div><hr>
                            <div class="categories">
                                <div class="content-bar">
                                    <div id="collapseOne1" class="collapse show head-bar"  data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="true" aria-controls="collapseExample" >
                                        <h3><?php echo e(App::getLocale() == 'ar' ? "الاحداث / المناسبات" : "Event / Occasion"); ?><i class="fa fa-angle-down"></i></h3>
                                    </div>
                                    <div class="bar-content collapse show" id="collapseTwo">
                                        <ul class="list-unstyled">
                                   

                                        <?php $__currentLoopData = $occasions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occasion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><a href="/products/occasion/<?php echo e($occasion->id); ?>">  <?php echo e(App::getLocale() == 'ar' ? $occasion->name_ar : $occasion->name_en); ?></a><span><?php echo e($occasion->products_count); ?></span></li>
                                   
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div><hr>

                            <div class="categories">
                                <div class="content-bar">
                                <div id="collapseOne2" class="collapse show head-bar"  data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="true" aria-controls="collapseThree" >
                                        <h3><?php echo e(App::getLocale() == 'ar' ? "الرسومات" : "Character"); ?><i class="fa fa-angle-down"></i></h3>
                                    </div>
                                    <div class="bar-content collapse show" id="collapseThree">
                                        <ul class="list-unstyled">
                                        <?php $__currentLoopData = $characters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $character): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><a href="/products/characters/<?php echo e($character->id); ?>">  <?php echo e(App::getLocale() == 'ar' ? $character->name_ar : $character->name_en); ?></a><span><?php echo e($character->products_count); ?></span></li>
                                   
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div><hr>

                            <div class="categories">
                                <div class="content-bar">
                                <div id="collapseOne3" class="collapse show head-bar"  data-toggle="collapse" href="#collapseFoure" role="button" aria-expanded="true" aria-controls="collapseExample" >
                                        <h3><?php echo e(App::getLocale() == 'ar' ? "نوع الحفل " : "Party Theme"); ?><i class="fa fa-angle-down"></i></h3>
                                    </div>
                                    <div class="bar-content collapse show" id="collapseFoure">
                                        <ul class="list-unstyled">
                                            
                                        <?php $__currentLoopData = $party; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Party_Theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><a href="/products/party/theme/<?php echo e($Party_Theme->id); ?>">  <?php echo e(App::getLocale() == 'ar' ? $Party_Theme->name_ar : $Party_Theme->name_en); ?></a><span><?php echo e($Party_Theme->products_count); ?></span></li>
                                   
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="product-cards">
                            <div class="row" style="width: 100%;display: flex;justify-content: center;">
                             
                            <?php if($products->isEmpty()): ?>
                            <?php $__env->startComponent('components.emptyWebsite',['sectionِAr'=>'منتجات','sectionِEn'=>'products','emptyCart'=>null]); ?> <?php echo $__env->renderComponent(); ?>

                            <?php endif; ?>

                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4">

                            <?php $__env->startComponent('components.product',['product'=>$product]); ?> <?php echo $__env->renderComponent(); ?>


                                </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>  
                        </div>
                        <?php echo e($products->links('vendor.pagination.default')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutWebsite.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>