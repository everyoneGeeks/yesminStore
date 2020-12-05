<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="login-form">

            <form action="/signin/submit" method="post">
            <?php echo csrf_field(); ?>

                <div class="form-group " >
                    <label for="email"><?php echo e(App::getLocale() == 'ar' ? "البريد الإلكترونى  ": "Email"); ?></label>
                    <input type="email" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" id="email" name="email"  placeholder="<?php echo e(App::getLocale() == 'ar' ? ' البريد الإلكترونى ': ' Your Email'); ?>">
                                    <?php if($errors->has('email')): ?>
                <span style="color:red;"><?php echo e($errors->first('email')); ?></span>
                <?php endif; ?>

                </div>
                <div class="form-group ">
                    <label for="password"><?php echo e(App::getLocale() == 'ar' ? "كلمة المرور": "Password"); ?></label>
                    <input type="password" class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" id="password"  name="password" placeholder="<?php echo e(App::getLocale() == 'ar' ? 'كلمة المرور': 'Password'); ?>">
                                    <?php if($errors->has('password')): ?>
                <span style="color:red;"><?php echo e($errors->first('password')); ?></span>
                <?php endif; ?>

                </div>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                <label class="form-check-label" for="exampleCheck1" style="margin-right: 21px;"><?php echo e(App::getLocale() == 'ar' ? "تذكرني": "Remember me"); ?></label>
                </br>
          
                <a href="/forgetPassword" style="
    margin-bottom: 9px;
" class="forget"><?php echo e(App::getLocale() == 'ar' ? "نسيت كلمة السر ؟": "Forget your password?"); ?></a>
      </div>
                <button type="submit" class="btn btn-block "><?php echo e(App::getLocale() == 'ar' ? "تسجيل ": "Login"); ?></button>
            </form>
            <div class="create">
                <p><?php echo e(App::getLocale() == 'ar' ? "ليس لديك حساب  ": "You have not account"); ?></p>
                <a href="/signup"><?php echo e(App::getLocale() == 'ar' ? "انشاء حسابك الان": "Register Now"); ?></a>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layoutWebsite.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>