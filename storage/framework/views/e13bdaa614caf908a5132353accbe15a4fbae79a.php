<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.Websiteerror',['errors'=>$errors ?? NULL]); ?> <?php echo $__env->renderComponent(); ?>
<div class="container">
                <div class="about">
                    <img src="<?php echo e(asset('img/faq.svg')); ?>" class="faq-img" alt="contact-img">
                    <h4 class="faq-header"><?php echo e(App::getLocale() == 'ar' ? "الاسئلة الشائعة":"FAQS"); ?></h4>
                    <div class="faq-content">
                        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h3><?php echo e($faq->questions); ?></h3>
                        <p><?php echo $faq->answer; ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layoutWebsite.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>