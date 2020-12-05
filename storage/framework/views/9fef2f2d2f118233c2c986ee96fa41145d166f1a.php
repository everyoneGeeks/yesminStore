<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.panel',['subTitle'=>' بيانات المستخدم']); ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?php echo e(asset($user->image)); ?>" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo e($user->name); ?></h3>


                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <span><?php echo e($user->email); ?></span> <b class="float-right">الايميل </b>
                  </li>
                  <li class="list-group-item">
                  <span><?php echo e($user->phone); ?></span> <b class="float-right">الهاتف </b>
                  </li>
                  <li class="list-group-item">
                  <span><?php echo e(Carbon\Carbon::parse($user->created_at)->format('Y-m-d H:m a')); ?></span> <b class="float-right"> تاريخ الانضمام </b>
                  </li>
                </ul>
                    <?php if($user->is_active == 1): ?>
    <a  href="/admin/user/status/<?php echo e($user->id); ?>" class="btn btn-block btn-success btn-sm"> مفعل</a>
    <?php else: ?>
    <a  href="/admin/user/status/<?php echo e($user->id); ?>" class="btn btn-block btn-danger btn-flat"> غير مفعل </a>
    <?php endif; ?>
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



      <?php $__env->startComponent('components.panel',['subTitle'=>'الطالبات السابقة ']); ?>
   



<?php echo $__env->renderComponent(); ?>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutDashboard.app',['title'=>'المستخدمين'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>