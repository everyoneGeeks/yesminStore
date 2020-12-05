
<?php if(Session::get('success')): ?>
<?php if(App::getLocale()=='ar'): ?>
<?php $__env->startSection('javascript'); ?>
<script>
toastr.success("<?php echo e(Session::get('success')['ar']); ?>");
</script>
<?php $__env->stopSection(); ?>

<?php else: ?> 

<?php $__env->startSection('javascript'); ?>
<script>
toastr.success("<?php echo e(Session::get('success')['en']); ?>");
</script>
<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php endif; ?>

<?php if(Session::get('error')): ?>

<?php if(App::getLocale()=='ar'): ?>
<div class="alert alert-danger" role="alert">
<?php echo e(Session::get('error')['ar']); ?>

</div>



<?php else: ?> 
<div class="alert alert-danger" role="alert">
 <?php echo e(Session::get('error')['en']); ?>

</div>



<?php endif; ?>

<?php endif; ?>


