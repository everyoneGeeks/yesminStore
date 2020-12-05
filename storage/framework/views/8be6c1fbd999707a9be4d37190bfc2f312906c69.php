<?php $__env->startSection('style'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.panel',['subTitle'=>' ادارة  الاعلانات']); ?>
<?php if($ads->isEmpty()): ?>

<?php $__env->startComponent('components.empty',['section'=>'الاعلانات']); ?> <?php echo $__env->renderComponent(); ?>

<?php else: ?> 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th> الصور </th>
            <th> تاريخ البداء </th>
            <th> تاريخ الانتهاء </th>
            <th>اللغة </th>
            <th>الحاله </th>
            <th>الافعال</th>
            <th>حذف</th>
        </tr>
        </thead>
        <tbody>  
<?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>

<th><img src="<?php echo e(asset($ad->image)); ?>" width=50px > </th>
<th><?php echo e(Carbon\Carbon::parse($ad->start_from)->format('Y-m-d H:m a')); ?></th>
<th><?php echo e(Carbon\Carbon::parse($ad->end_at)->format('Y-m-d H:m a')); ?></th>
<th><?php echo e($ad->lang); ?></th>
<th>
<?php if(Carbon\Carbon::parse($ad->start_from)->greaterThanOrEqualTo(Carbon\Carbon::now())): ?>

  <span class="badge badge-info"> قريبا  </span>  
<?php else: ?> 

<?php if(Carbon\Carbon::now()->greaterThanOrEqualTo(Carbon\Carbon::parse($ad->start_from)) 
&& Carbon\Carbon::now()->lessThanOrEqualTo(Carbon\Carbon::parse($ad->end_at))): ?>  
<span class="badge badge-success">  يعرض الان  </span> 
<?php else: ?>
<span class="badge badge-danger"> انتهي الاعلان </span> 
<?php endif; ?>
<?php endif; ?>

</th>
<th><a href="/admin/ad/edit/<?php echo e($ad->id); ?>" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
<th><a href="/admin/ad/edit/<?php echo e($ad->id); ?>" class="btn btn-block btn-danger btn-flat"> حذف </a></th>
        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

        </tbody>

        </table>

<?php endif; ?>

<?php $__env->slot('footer'); ?>
<div class="col-lg-4">

<a  href="/admin/ad/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة  اعلان  </a>
</div>
<?php $__env->endSlot(); ?>

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
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "autoWidth": false
    });
  });
</script>

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutDashboard.app',['title'=>' الاعلانات'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>