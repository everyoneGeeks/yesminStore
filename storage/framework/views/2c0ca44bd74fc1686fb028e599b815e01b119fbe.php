<?php $__env->startSection('style'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.panel',['subTitle'=>' ادارة  اكواد الخصم']); ?>
<?php if($codes->isEmpty()): ?>

<?php $__env->startComponent('components.empty',['section'=>'اكواد الخصم']); ?> <?php echo $__env->renderComponent(); ?>

<?php else: ?> 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th> الكود </th>
            <th>انتهاء التاريح </th>
            <th>التاريح الانشاء</th>
            <th>نسبة الخصم</th>
            <th> عدد مرات الاستخدم </th>
            <th>الحالة</th>
            <th>الافعال</th>
        </tr>
        </thead>
        <tbody>  
<?php $__currentLoopData = $codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>

<th><?php echo e($code->code); ?> </th>
<th><?php echo e(Carbon\Carbon::parse($code->end_date)->format('Y-m-d H:m a')); ?></th>
<th><?php echo e(Carbon\Carbon::parse($code->created_at)->format('Y-m-d H:m a')); ?></th>
<th><?php echo e($code->discount); ?> </th>
<th><?php echo e($code->count); ?> </th>

<?php if($code->is_active == 1): ?>
<th><a  href="/code/status/<?php echo e($code->id); ?>" class="btn btn-block btn-success btn-sm"> مفعل</a></th>
<?php else: ?>
<th><a  href="/code/status/<?php echo e($code->id); ?>" class="btn btn-block btn-danger btn-flat"> غير مفعل </a></th>
<?php endif; ?>

<th><a href="/code/edit/<?php echo e($code->id); ?>" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--<th> الكود </th>-->
        <!--    <th>انتهاء التاريح </th>-->
        <!--    <th>التاريح الانشاء</th>-->
        <!--    <th>نسبة الخصم</th>-->
        <!--    <th> عدد مرات الاستخدم </th>-->
        <!--    <th>الحالة</th>-->
        <!--    <th>الافعال</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

<?php endif; ?>

<?php $__env->slot('footer'); ?>
<div class="col-lg-4">

<a  href="/code/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة  كود  </a>
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
<?php echo $__env->make('layoutDashboard.app',['title'=>' اكواد الخصم'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>