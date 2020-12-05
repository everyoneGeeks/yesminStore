<div class="order-steps">

    <a href="#" class="step-item <?php echo e($statu == 0 ?  'current': ''); ?>   <?php echo e($statu >= 0 ?  'active': ''); ?>      ">
        <div class="step-progress">
            <div class="step-count">1</div>
        </div>
        <div class="step-label"><?php echo e(App::getLocale() == 'ar' ? "سلة التسوق":"Cart"); ?></div>
    </a>

    <a href="#" class="step-item  <?php echo e($statu == 1 ?  'current': ''); ?>   <?php echo e($statu >= 1 ?  'active': ''); ?> ">
        <div class="step-progress">
            <div class="step-count">2</div>
        </div>
        <div class="step-label"><?php echo e(App::getLocale() == 'ar' ? "الشحن":"Shipping"); ?></div>
    </a>

    <a href="#" class="step-item <?php echo e($statu == 2 ?  'current': ''); ?>   <?php echo e($statu >= 2 ?  'active': ''); ?>">

        <div class="step-progress">
            <div class="step-count">3</div>
        </div>  
        <div class="step-label"><?php echo e(App::getLocale() == 'ar' ? "الدفع":"Payment"); ?></div>
    </a>
    <a href="#" class="step-item <?php echo e($statu == 3 ?  'current active': ''); ?>    ">
        <div class="step-progress">
            <div class="step-count">4</div>
        </div>
        <div class="step-label"><?php echo e(App::getLocale() == 'ar' ? "متابعة الطلب ":"Tracking"); ?></div>
    </a>
    
</div>