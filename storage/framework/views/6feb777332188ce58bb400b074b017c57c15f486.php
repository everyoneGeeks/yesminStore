<?php $__env->startSection('style'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.panel',['subTitle'=>' ادارة الطلبات']); ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span><?php echo e($order->order_id); ?></span> <b class="float-right">رقم الطلب   </b>
                  </li>
                 
                  <li class="list-group-item">
                    <span><a href="/admin/user/info/<?php echo e($order->user_id); ?>"><?php echo e($order->user->first_name); ?> </a> </span> <b class="float-right">  العميل   </b>
                  </li>
                  <li class="list-group-item">
                    <span><?php echo e($order->price); ?></span> <b class="float-right">  اجمالي السعر  </b>
                  </li>
                  <li class="list-group-item">
                    <span><?php echo e($order->discount); ?></span> <b class="float-right">  اجمالي الخصم  %  </b>
                  </li>
                  <li class="list-group-item">
                    <span><?php echo e($order->discount_code); ?></span> <b class="float-right">    كود الخصم  </b>
                  </li>
                  <li class="list-group-item">
                    <span>
                      <?php if($order->status == 'new'): ?>
                      جديد
                      <?php elseif($order->status == 'inprogress'): ?>
                      قيد التنفيذ
                      <?php elseif($order->status == 'delivered'): ?>
                      تم التوصيل
                      <?php endif; ?>
                    </span> <b class="float-right">  حالة الطلب   </b>
                  </li>

                  <li class="list-group-item">
                    <span><?php echo e($order->payment_method); ?></span> <b class="float-right">  وسبلة الدفع  </b>
                  </li>

   

                  <li class="list-group-item">
                    <span><?php echo e($order->shipping->cost); ?></span> <b class="float-right">   تكلفة الشحن   </b>
                  </li>
                  <li class="list-group-item">
                    <span>مصر </span> <b class="float-right">   دولة   الشحن  </b>
                  </li>
                  <li class="list-group-item">
                    <span><?php echo e($order->shipping->cities->name_ar); ?></span> <b class="float-right">  مدينة الشحن   </b>
                  </li>

                  <li class="list-group-item">
                  <span><?php echo e(Carbon\Carbon::parse($order->created_at)->format('Y-m-d H:m a')); ?></span> <b class="float-right"> تاريخ الانضمام </b>
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

   <?php $__env->startComponent('components.panel',['subTitle'=>'الشحن']); ?>

  <div class="container-fluid">
        <div class="row">
  
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
      



                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span><?php echo e($order->address->first_name); ?></span> <b class="float-right">الاسم الاول   </b>
                  </li>

                  <li class="list-group-item">
                    <span><?php echo e($order->address->last_name); ?></span> <b class="float-right">الاسم الاخير    </b>
                  </li>


                  <li class="list-group-item">
                    <span><?php echo e($order->address->country->name_ar); ?></span> <b class="float-right">الدولة     </b>
                  </li>


                  <li class="list-group-item">
                    <span><?php echo e($order->address->city->name_ar); ?></span> <b class="float-right"> المدينة    </b>
                  </li>


     

                  <li class="list-group-item">
                    <span><?php echo e($order->address->street_name); ?></span> <b class="float-right"> اسم الشارع    </b>
                  </li>



                  <li class="list-group-item">
                    <span><?php echo e($order->address->building_name); ?></span> <b class="float-right"> رقم العقار    </b>
                  </li>

                  <li class="list-group-item">
                    <span><?php echo e($order->address->floor); ?></span> <b class="float-right"> رقم الدور    </b>
                  </li>


                  <li class="list-group-item">
                    <span><?php echo e($order->address->apartment); ?></span> <b class="float-right"> رقم   الشقة    </b>
                  </li>


                  <li class="list-group-item">
                    <span><?php echo e($order->address->nearest); ?></span> <b class="float-right"> أقرب علامة مميزة    </b>
                  </li>

                  <li class="list-group-item">
                    <span><?php echo e($order->address->location); ?></span> <b class="float-right"> نوع الموقع   </b>
                  </li>


                  <li class="list-group-item">
                    <span><?php echo e($order->address->phone_number); ?></span> <b class="float-right"> رقم الهاتف   </b>
                  </li>


                  <li class="list-group-item">
                    <span><?php echo e($order->address->additional_phone_number); ?></span> <b class="float-right"> رقم هاتف اختياري    </b>
                  </li>


                  <li class="list-group-item">
                    <span><?php echo e($order->address->shipping_note); ?></span> <b class="float-right">ملاحظات الشحن    </b>
                  </li>



                  <li class="list-group-item">
                    <span><?php echo e($order->address->address_name); ?></span> <b class="float-right"> اسم العنوان   </b>
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
        <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

 <?php $__env->startSection('javascript'); ?>
<!-- DataTables -->
<script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.js')); ?>"></script>
<!-- page script -->
<script>
  $(function () {

    $('#example2').DataTable({
        "language": {
            "paginate": {
                "next": "بعد",
                "previous" : "قبل"
            }
        },
      "info" : true,
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "autoWidth": false
    });
  });
</script>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutDashboard.app',['title'=>'الطلبات'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>