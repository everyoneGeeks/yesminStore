<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.Websiteerror',['errors'=>$errors ?? NULL]); ?> <?php echo $__env->renderComponent(); ?>
<div class="container">
                <div class="about">
                    <h4><?php echo e(App::getLocale() == 'ar' ? " عن متجرنا  ": "ABOUT US"); ?></h4>
                    <p><?php echo App::getLocale() == 'ar' ? \App\websiteSetting::find(1)->aboutus_ar :\App\websiteSetting::find(1)->aboutus; ?>

</p>
                </div>
            </div>




<?php $__env->stopSection(); ?>


<?php echo $__env->make('layoutWebsite.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>