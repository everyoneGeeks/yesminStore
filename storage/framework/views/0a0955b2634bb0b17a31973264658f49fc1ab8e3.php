<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.Websiteerror',['errors'=>$errors ?? NULL]); ?> <?php echo $__env->renderComponent(); ?>
<div class="container">
                <div class="about">
                    <h4><?php echo e(App::getLocale() == 'ar' ? " سياسة الخصوصية ": " Privacy Policy"); ?></h4>
                    <p><?php echo App::getLocale() == 'ar' ? \App\websiteSetting::find(1)->terms_policy_ar :\App\websiteSetting::find(1)->terms_policy; ?>

</p>
                </div>
            </div>




<?php $__env->stopSection(); ?>


<?php echo $__env->make('layoutWebsite.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>