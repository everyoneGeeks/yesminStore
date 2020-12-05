<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.panel',['subTitle'=>' بيانات العميل ']); ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">



                <ul class="list-group list-group-unbordered mb-3">

 <li class="list-group-item">
                    <span><a href="/admin/user/info/<?php echo e($Complains->user->id); ?>"><?php echo e($Complains->user->first_name); ?></a></span> <b class="float-right">الاسم  </b>
                  </li>
                  <li class="list-group-item">
                    <span><?php echo e($Complains->user->email); ?></span> <b class="float-right">الايميل </b>
                  </li>
                  <li class="list-group-item">
                  <span><?php echo e($Complains->user->phone); ?></span> <b class="float-right">الهاتف </b>
                  </li>
                 <li class="list-group-item">
                  <span><?php echo e($Complains->subject); ?></span> <b class="float-right">محتوي الشكوي  </b>
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
      

      
     
<?php $__env->startComponent('components.panel',['subTitle'=>'  الطلب ']); ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span><?php echo e($Complains->order->order_id); ?></span> <b class="float-right">رقم الطلب   </b>
                  </li>
                 
                  <li class="list-group-item">
                    <span><?php echo e($Complains->order->price); ?></span> <b class="float-right">  اجمالي السعر  </b>
                  </li>
                  <li class="list-group-item">
                    <span><?php echo e($Complains->order->discount); ?></span> <b class="float-right">  اجمالي الخصم  %  </b>
                  </li>
                  <li class="list-group-item">
                    <span><?php echo e($Complains->order->discount_code); ?></span> <b class="float-right">    كود الخصم  </b>
                  </li>
                  

                  <li class="list-group-item">
                    <span><?php echo e($Complains->order->payment_method); ?></span> <b class="float-right">  وسبلة الدفع  </b>
                  </li>

   
                  <li class="list-group-item">
                    <span><?php echo e($Complains->order->shipping->cities->name_ar); ?>,<?php echo e($Complains->order->address->street_name); ?>,<?php echo e($Complains->order->address->building_name); ?>, عمارة رقم <?php echo e($Complains->order->address->floor); ?></span> <b class="float-right">   عنوان الشحن   </b>
                  </li>


                  <li class="list-group-item">
                  <span><?php echo e(Carbon\Carbon::parse($Complains->order->created_at)->format('Y-m-d H:m a')); ?></span> <b class="float-right"> تاريخ الانضمام </b>
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



  <?php $__env->startComponent('components.panel',['subTitle'=>'المنتجات ']); ?>

  <div class="container-fluid">
        <div class="row">
        <?php $__currentLoopData = $Complains->order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-fluid " width="150px" height="150px"  style="margin-bottom:50px"src="<?php echo e(asset($product->product->main_image)); ?>" alt="User profile picture">
                </div>



                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span><a href="/admin/product/info/<?php echo e($product->product->id); ?>"> <?php echo e($product->product->name_ar); ?> </a> </span> <b class="float-right">الاسم    </b>
                  </li>

                  <li class="list-group-item">
                  <b class="float-right">الوصف    </b>
                    <span><?php echo e($product->product->description_ar); ?></span> 
                  </li>

                  <?php if($product->character !==null): ?>
                  <li class="list-group-item">
               <span><?php echo e($product->character->name_ar); ?>  </span> <b class="float-right">  الشخصية   </b>
                  </li>
                  <?php endif; ?>

                  <?php if($product->occasion !== null ): ?> 
                  <li class="list-group-item">
                <span><?php echo e($product->occasion->name_ar); ?>  </span> <b class="float-right">  المناسبة   </b>
                  </li>
                  <?php endif; ?>


                  <?php if($product->party_theme !==null ): ?>
                  <li class="list-group-item"><span><?php echo e($product->party_theme->name_ar); ?>  </span> <b class="float-right">  نوع الحفل    </b>
                  </li>
                  <?php endif; ?>


                  <?php if($product->size !==null): ?>
                  <li class="list-group-item">
                     <span><?php echo e($product->size->name_ar); ?>  </span> <b class="float-right">  الحجم    </b>
                  </li>
                  <?php endif; ?>


     

                  <li class="list-group-item">
                    <span><?php echo e($product->price); ?></span> <b class="float-right">  السعر   </b>
                  </li>
                  <li class="list-group-item">
                    <span><?php echo e($product->amount); ?></span> <b class="float-right">  الكمية    </b>
                  </li>

                  <li class="list-group-item">
                    <span><?php echo e($product->discount); ?></span> <b class="float-right">  نسبة الخصم  </b>
                  </li>


<?php if($product->personalize): ?>
<hr>
<p> اضافة الطابع الشخصي </p>
                  <li class="list-group-item">
                    <span><?php echo e($product->child_name); ?></span> <b class="float-right">     </b>
                  </li>
                  <li class="list-group-item">
                    <span><?php echo e($product->child_age); ?></span> <b class="float-right">  الكمية    </b>
                  </li>


<?php endif; ?>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
         
         
  
  
  
  
  
  
  
  
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>



<?php echo $__env->renderComponent(); ?>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutDashboard.app',['title'=>'الشكوي'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>