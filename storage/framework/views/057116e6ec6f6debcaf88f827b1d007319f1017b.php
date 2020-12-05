<?php $__env->startSection('content'); ?>
<div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">المستخدمين</span>
                <span class="info-box-number"><?php echo e($users->count()); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa  fa-list"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">المنتجات </span>
                <span class="info-box-number"> <?php echo e($products->count()); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-bullhorn"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">الاعلانات</span>
                <span class="info-box-number"><?php echo e($ads->count()); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i aria-hidden="true" class="fa fa-shopping-cart "></i></span>

              <div class="info-box-content">
                <span class="info-box-text">الطلبات</span>
                <span class="info-box-number"><?php echo e($orders->count()); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

<?php $__env->startComponent('components.panel',['subTitle'=>'اخر الطلبات ']); ?>

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ارقم الطلب   </th>
            <th> اسم العميل </th>
            <th>التاريخ</th>
        </tr>
        </thead>
        <tbody>
<?php $__currentLoopData = $lastOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
<th> <a href="/admin/order/info/<?php echo e($order->id); ?>"><?php echo e($order->order_id); ?></th>
<th> <a href="/admin/user/info/<?php echo e($order->user_id); ?>"><?php echo e($order->user->first_name); ?></th>

<th><?php echo e(Carbon\Carbon::parse($order->created_at)->format('Y-m-d')); ?></th>




        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--    <th>الاسم  </th>-->
        <!--    <th>الايميل</th>-->
        <!--    <th> الصور</th>-->
        <!--    <th>الهاتف</th>-->
        <!--    <th>الحالة</th>-->
        <!--    <th>رصيد حساب</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

<?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('components.panel',['subTitle'=>'اخر المستخدميين ']); ?>

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم  </th>
            <th>التاريخ</th>
            <th>الحالة</th>
        </tr>
        </thead>
        <tbody>
<?php $__currentLoopData = $lastUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
<th> <a href="/admin/user/info/<?php echo e($user->id); ?>"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></th>
<th><?php echo e(Carbon\Carbon::parse($user->created_at)->format('Y-m-d')); ?></th>
<?php if($user->is_active == 1): ?>
<th><a  href="/admin/user/status/<?php echo e($user->id); ?>" class="btn btn-block btn-success btn-sm"> مفعل</a></th>
<?php else: ?>
<th><a  href="/admin/user/status/<?php echo e($user->id); ?>" class="btn btn-block btn-danger btn-flat"> غير مفعل </a></th>
<?php endif; ?>


        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--    <th>الاسم  </th>-->
        <!--    <th>الايميل</th>-->
        <!--    <th> الصور</th>-->
        <!--    <th>الهاتف</th>-->
        <!--    <th>الحالة</th>-->
        <!--    <th>رصيد حساب</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>
<?php echo $__env->renderComponent(); ?>
<div class="row">

<div class="col-lg-12" style="
    margin-bottom: 40px;
">
<?php echo $ordersChart->html(); ?>

</div>

<div class="col-lg-12">
<?php echo $userChart->html(); ?>

</div>

</div>
 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('javascript'); ?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
 <?php echo Charts::scripts(); ?>

<?php echo $userChart->script(); ?>

<?php echo $ordersChart->script(); ?>

 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutDashboard.app',['title'=>'الاحصائيات' ,'subTitle'=>'ادارة الاحصائيات'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>