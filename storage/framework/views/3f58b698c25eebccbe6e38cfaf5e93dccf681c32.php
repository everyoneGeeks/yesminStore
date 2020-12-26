<?php if($errors->any()): ?>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php if(App::getLocale() == 'ar'): ?>
<?php $__env->startSection('javascript'); ?>
<script>
toastr.error("<?php echo e($error); ?>", 'خطاء !');
</script>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('javascript'); ?>
<?php if(App::getLocale() == 'en'): ?>
<script>
toastr.error("<?php echo e($error); ?>", 'error !');
</script>
<?php endif; ?> 
<?php $__env->stopSection(); ?>




          

      

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

