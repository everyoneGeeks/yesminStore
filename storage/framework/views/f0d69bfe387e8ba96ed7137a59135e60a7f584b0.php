<?php if(App\websiteSetting::find(1)->Close == 'no'): ?>
<?php if(App\websiteSetting::find(1)->CloseType == 1): ?>
<?php echo $__env->make('closeStatus2', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php else: ?> 

<?php echo $__env->make('closeStatus1', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php endif; ?>

<?php else: ?>
<?php echo $__env->make('layoutWebsite.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layoutWebsite.body', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layoutWebsite.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php endif; ?>