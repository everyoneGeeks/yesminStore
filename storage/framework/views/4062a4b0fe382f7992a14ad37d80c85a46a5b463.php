<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.panel',['subTitle'=>'    بيانات المنتج']); ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-fluid " width="150px" height="150px"  style="margin-bottom:50px"src="<?php echo e(asset($product->main_image)); ?>" alt="User profile picture">
                </div>



                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span><?php echo e($product->name_ar); ?></span> <b class="float-right">الاسم  العربي  </b>
                  </li>
                  <li class="list-group-item">
                    <span><?php echo e($product->name_en); ?></span> <b class="float-right">الاسم  بالاجنبي  </b>
                  </li>

                  <li class="list-group-item">
                  <b class="float-right">الصوف  العربي  </b>
                    <span><?php echo e($product->description_ar); ?></span> 
                  </li>
                  <li class="list-group-item">
                  <b class="float-right">الوصف  بالاجنبي  </b>
                    <span><?php echo e($product->description_en); ?></span> 
                  </li>

                  <?php if(!$product->character->isEmpty()): ?>
                  <li class="list-group-item">
                 <?php $__currentLoopData = $product->character; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $character): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <span><?php echo e($character->name_ar); ?> , </span><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <b class="float-right">  الشخصية   </b>
                  </li>
                  <?php endif; ?>

                  <?php if(!$product->occasion->isEmpty()): ?>
                  <li class="list-group-item">
                 <?php $__currentLoopData = $product->occasion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occasion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <span><?php echo e($occasion->name_ar); ?> , </span><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <b class="float-right">  المناسبة   </b>
                  </li>
                  <?php endif; ?>


                  <?php if(!$product->party_theme->isEmpty()): ?>
                  <li class="list-group-item">
                 <?php $__currentLoopData = $product->party_theme; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $party_theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <span><?php echo e($party_theme->name_ar); ?> , </span><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <b class="float-right">  نوع الحفل    </b>
                  </li>
                  <?php endif; ?>


                  <?php if(!$product->size->isEmpty()): ?>
                  <li class="list-group-item">
                 <?php $__currentLoopData = $product->size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <span><?php echo e($size->name_ar); ?> , </span><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <b class="float-right">  الحجم    </b>
                  </li>
                  <?php endif; ?>


                  <?php if($product->url !== null): ?>
                  <li class="list-group-item">
                       <span>             <iframe width="420" height="300" src="<?php echo e($product->url); ?>">
                                </iframe></span> <b class="float-right">  فيديو     </b>
                  </li>
                  <?php endif; ?>

     

                  <li class="list-group-item">
                    <span><?php echo e($product->price); ?></span> <b class="float-right">  السعر   </b>
                  </li>

                  <li class="list-group-item">
                    <?php if($product->amount == 0): ?>
                    <span class="alert-danger"> لا توجد كمية متاحة     </span>
                    <?php else: ?> 
                    <span>  <?php echo e($product->amount); ?>    </span>
                    <?php endif; ?>
                
                  <b class="float-right">  الكمية   </b>
                  </li>


                  <li class="list-group-item">
                    <span><?php echo e($product->discount); ?></span> <b class="float-right">  نسبة الخصم  </b>
                  </li>


                  <li class="list-group-item">
                    <span><a href="/admin/category/info/<?php echo e($product->category->id); ?>"><?php echo e($product->category->name_ar); ?></a></span> <b class="float-right">  القسم   الرائيسي </b>
                  </li>

                  <li class="list-group-item">
                    <span><a href="/admin/subcategory/info/<?php echo e($product->subcategory->id); ?>"><?php echo e($product->subcategory->name_ar); ?></a></span> <b class="float-right">  القسم  الفرعي  </b>
                  </li>

                  <li class="list-group-item">
                  <span><?php echo e(Carbon\Carbon::parse($product->created_at)->format('Y-m-d H:m a')); ?></span> <b class="float-right"> تاريخ الانضمام </b>
                  </li>


                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <?php echo $__env->renderComponent(); ?>



      <?php $__env->startComponent('components.panel',['subTitle'=>' صور المنتج']); ?>


<div class="col-lg-12">
<?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-lg-3" style="display:inline-block">
<div class="thumbnail">
  <img src="<?php echo e($images->image); ?>" alt="..." width="150px" height="150px">
  <div class="caption">
    </form>
  </div>
</div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

  <?php echo $__env->renderComponent(); ?>

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutDashboard.app',['title'=>' المنتجات'] , \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>