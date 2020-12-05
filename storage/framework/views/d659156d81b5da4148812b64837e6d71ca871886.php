<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/party-supplies.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

        <!-- Party supplies secondary categories -->
        <div class="party-supplies">
                <div class="container">
                    <div class="row">
                        <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="one-category">
                                <a href="/products/<?php echo e($subCategory->id); ?>">
                                    <img src="<?php echo e(asset($subCategory->image)); ?>" alt="">
                                    <?php if(App::getLocale() == 'ar'): ?>
                                    <h4 style="
    padding-left: 20px;
    padding-bottom: 20px;
    padding-top: 20px;
">
<?php else: ?>
                                    <h4 style="
    padding-top: 20px;
    position: relative;
    left: 53px;
">

<?php endif; ?>
                                        <?php echo e(App::getLocale() == 'ar' ? $subCategory->name_ar : $subCategory->name_en); ?></h4>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                    </div>
                </div>
            </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutWebsite.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>