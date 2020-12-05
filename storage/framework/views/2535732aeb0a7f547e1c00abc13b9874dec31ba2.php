<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/wishlist.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.Websiteerror',['errors'=>$errors ?? NULL]); ?> <?php echo $__env->renderComponent(); ?>
<div class="cart-details">
            <div class="container">
                <div class="row">
                <?php $__env->startComponent('components.userInfoDashboardList',['user'=>$user]); ?> <?php echo $__env->renderComponent(); ?>
                <div class="col-md-8">
                        <div class="products">
                            <h3><img src="img/Whishlist.svg" alt=""><?php echo e(App::getLocale() == 'ar' ?  "المفضلة": "Wishlist"); ?></h3>
                            <?php $__currentLoopData = $wishLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="product-cart-details">
                                <div class="img-section">
                                    <div class="image">
                                        <img src="<?php echo e(asset($wishList->product->main_image)); ?>" alt="" class="pro-img">
                                        <a href="/wishlist/delete/<?php echo e($wishList->product_id); ?>"><?php echo e(App::getLocale() == 'ar' ?  "حذف": "Remove"); ?></a>
                                    </div>
                                    <div class="details">
                                        <a href="/product/info/<?php echo e($wishList->product->id); ?>" class="name">
                                        <h4>

                                        <?php if(App::getLocale() == 'ar'): ?>
                                        <?php echo e($wishList->product->name_ar); ?>

                                        <?php else: ?> 
                            
                                        <?php echo e($wishList->product->name_en); ?>

                                        <?php endif; ?>
                                        </h4></a>
                                        <div class="price">
                                        <?php if($wishList->discount > 0): ?>
                                    <span class="aft-dis">EGP <?php echo e($wishList->price - $wishList->price*$wishList->discount/100); ?></span>
                                    <span class="bef-dis">EGP <?php echo e($wishList->price); ?></span>
                                    <span class="discount">-<?php echo e($wishList->discount); ?>% </span>
                                    <?php else: ?> 
                           
                                    <span class="aft-dis">EGP <?php echo e($wishList->price); ?></span>
                                    <?php endif; ?>
                                        </div>
                                    </div>
                                    <a href="/cart/add/<?php echo e($wishList->product_id); ?>" class="btn"><?php echo e(App::getLocale() == 'ar' ?  "اضافة الي السله ": "Add to cart"); ?> <img src="<?php echo e(asset('img/cart.svg')); ?>" alt=""></a>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php echo e($wishLists->links('vendor.pagination.default')); ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layoutWebsite.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>