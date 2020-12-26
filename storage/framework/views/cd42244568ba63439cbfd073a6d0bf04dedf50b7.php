<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.Websiteerror',['errors'=>$errors ?? NULL]); ?> <?php echo $__env->renderComponent(); ?>


<div class="container">
                <div class="about contact">
                    <img src="<?php echo e(asset('img/customer-services.svg')); ?>" class="customer-img" alt="contact-img">
                    <h4><?php echo e(App::getLocale() == 'ar' ? " تواصل معنا ": "CONTACT US"); ?></h4>
                    <div style="
    position: relative;
    bottom: 49px;
" class="contact-content">
                    <p><?php echo App::getLocale() == 'ar' ? \App\websiteSetting::find(1)->contactus_ar :\App\websiteSetting::find(1)->contactus; ?>


                    </div>
                </div>
            </div>






<?php $__env->stopSection(); ?>


<?php echo $__env->make('layoutWebsite.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>