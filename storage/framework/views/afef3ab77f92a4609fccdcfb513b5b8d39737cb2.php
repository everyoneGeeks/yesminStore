<?php $__env->startSection('style'); ?>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('close/css/fontawesome.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('close/css/framework.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.error',['errors' => $errors ?? NULL]); ?> <?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('components.panel',['subTitle'=> 'Social Media Settings']); ?>
<form role="form" action="<?php echo e(route('appSetting.links.edit')); ?>" method="post" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <div class="main-box social-websites">
    <p class="description">Leave Empty If You Don't Want To Show in Website</p>
    <div class="social-box">
      <i class="fab fa-facebook"></i>
      <input type="text" name="facebook" value="<?php echo e($appSetting->facebook); ?>" placeholder="Your Facebook URl" />
    </div>
    <div class="social-box">
      <i class="fab fa-twitter-square"></i>
      <input type="text" name="twitter" value="<?php echo e($appSetting->twitter); ?>" placeholder="Your Twitter URl" />
    </div>
    <div class="social-box">
      <i class="fab fa-youtube"></i>
      <input type="text" name="youTube" value="<?php echo e($appSetting->youTube); ?>" placeholder="Your Youtube URl" />
    </div>
    <div class="social-box">
      <i class="fab fa-instagram-square"></i>
      <input type="text" name="instagram" value="<?php echo e($appSetting->instagram); ?>" placeholder="Your Instagram URl" />
    </div>
    <div class="social-box">
      <i class="fab fa-pinterest-square"></i>
      <input type="text" name="pinterest" value="<?php echo e($appSetting->pinterest); ?>" placeholder="Your Pinterest URl" />
    </div>
    <div class="social-box">
      <i class="fab fa-tiktok"></i>
      <input type="text" name="tiktok"  value="<?php echo e($appSetting->tiktok); ?>" placeholder="Your Tik Tok URl" />
    </div>
    <div class="social-box">
      <i class="fab fa-snapchat-square"></i>
      <input type="text" name="snapchat"  value="<?php echo e($appSetting->snapchat); ?>" placeholder="Your SnapChat URl" />
    </div>
  </div>
  <button type="submit" class="m-t-20 btn btn-primary">Save</button>
</form>
<?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('close/js/jquery-3.5.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('close/js/master.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutDashboard.app', ['title'=>'Social Media'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>