<?php if($paginator->hasPages()): ?>
<nav aria-label="Page navigation example" class="">
                            <ul class="pagination">
        
            <?php if($paginator->hasMorePages()): ?>

        <li class="page-item">
                                    <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">
                                        <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>

        <?php else: ?>

        <li class="page-item disabled">
                                    <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">
                                        <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>

        <?php endif; ?>
        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <li class="disabled" aria-disabled="true"><span><?php echo e($element); ?></span></li>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                    <li class="page-item active"  aria-current="page"><a class="page-link" href="#"><?php echo e($page); ?></a></li>
                   
                    <?php else: ?>
                    <li class="page-item "  aria-current="page"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
    
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        
         <?php if($paginator->onFirstPage()): ?>

        <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
        <?php else: ?>


        <li class="page-item ">
                                    <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->getFromJson('pagination.previous'); ?>">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
        <?php endif; ?>

   
    </ul>
<?php endif; ?>
</nav>





                 