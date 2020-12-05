<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.Websiteerror',['errors'=>$errors ?? NULL]); ?> <?php echo $__env->renderComponent(); ?>
<div class="login-form">
            <form action="/forgetPassword/submit" method="post">
            <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="email"><?php echo e(App::getLocale() == 'ar' ? "يرجى إدخال عنوان البريد الإلكتروني. سنرسل لك رابطًا إلى عنوان البريد الإلكتروني هذا لإعادة تعيين كلمة المرور الخاصة بك. ": "Please enter the e-mail address. We will send you a link to this e-mail address to reset your password. "); ?></label>
                    <input type="email" class="form-control" id="email" name="email"  placeholder="<?php echo e(App::getLocale() == 'ar' ? 'الايميل الخاص': ' Your Email'); ?>">
                </div>
             
                <button type="submit" class="btn btn-block "><?php echo e(App::getLocale() == 'ar' ?  "إعادة تعيين كلمة المرور" : "Reset Password "); ?></button>
            </form>
        </div>
    </div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layoutWebsite.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>