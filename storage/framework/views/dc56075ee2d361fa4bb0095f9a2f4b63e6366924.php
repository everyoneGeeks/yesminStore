<?php $__env->startSection('style'); ?>
<style>
.content-wrapper, .main-footer, .main-header{
  z-index:0;
}

</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.panel',['subTitle'=>'  بيانات  شحن الرصيد']); ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?php echo e(asset($BalanceRecharge->image)); ?>" alt="User profile picture">
                </div>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <span><?php echo e($BalanceRecharge->amount); ?></span> <b class="float-right">الكمية </b>
                  </li>
                  
                  <li class="list-group-item">
                    <?php if($BalanceRecharge->is_approved == 1): ?>
                    <span class="badge bg-success"> موافق</span><b class="float-right">الحالة </b>
                   <?php else: ?>
                    <span class="badge bg-danger">غير موافق</span> <b class="float-right">الحالة </b>
                  <?php endif; ?>  
                  </li>
                  <li class="list-group-item">
                  <span><?php echo e(Carbon\Carbon::parse($BalanceRecharge->created_at)->format('Y-m-d H:m a')); ?></span> <b class="float-right"> تاريخ الانضمام </b>
                  </li>
                  <?php if($BalanceRecharge->user !== NULL): ?>         
                  <li class="list-group-item">
                  <span><a href="/user/info/<?php echo e($BalanceRecharge->user->id); ?>"><?php echo e($BalanceRecharge->user->name); ?></a></span> <b class="float-right"> المستخدم  </b>
                  </li>                  
                    <th> </th>
                  <?php else: ?>
                  <?php if($BalanceRecharge->provider !== NULL): ?> 
                  <li class="list-group-item">
                  <span><a href="/provider/info/<?php echo e($BalanceRecharge->provider->id); ?>"><?php echo e($BalanceRecharge->provider->name); ?></a></span> <b class="float-right"> المندوب  </b> 
                  </li>          
                  <?php endif; ?>
                  <?php endif; ?>
                </ul>

                <?php if($BalanceRecharge->is_approved == 1): ?>
                <a  href="/balance/recharging/disapprove/<?php echo e($BalanceRecharge->id); ?>" class="btn btn-block btn-danger btn-sm"> غير موافق </a>
                <?php else: ?>
                <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">موافق</button>

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="exampleModalLabel">شحن الرصيد</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="<?php echo e(route('Balance.recharging.approve',$BalanceRecharge->id)); ?>" method="post" enctype="multipart/form-data" >
                      <?php echo csrf_field(); ?>
                      <div class="form-group">
                        <label for="Inputamount"> الكمية  </label>
                        <input type="number" class="form-control" id="Inputamount"  name="amount">
                      </div>
                      <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                      <button type="submit" class="btn btn-primary">ارسال </button>
                    </div>

                  </div>
                </div>
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




      
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutDashboard.app',['title'=>'شحن الرصيد' ,'subTitle'=>' بيانات  شحن الرصيد '], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>