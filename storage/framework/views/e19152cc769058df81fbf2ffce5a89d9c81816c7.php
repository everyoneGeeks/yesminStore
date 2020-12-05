<?php $__env->startSection('style'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.panel',['subTitle'=>' ادارة المسئولين']); ?>
<?php if($admins->isEmpty()): ?>

<?php $__env->startComponent('components.empty',['section'=>'مسئولين ']); ?> <?php echo $__env->renderComponent(); ?>

<?php else: ?> 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم  </th>
            <th>الايميل </th>
            <th>النوع</th>
            <th>تعديل </th>
            <th>حذف </th>
        </tr>
        </thead>
        <tbody>  
<?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
<th> <a href="/admin/admin/info/<?php echo e($admin->id); ?>"><?php echo e($admin->name); ?></a></th>
<th> <?php echo e($admin->email); ?></th>
<?php if($admin->is_super_admins == 1): ?>
<th> <span class="badge badge-success h3">الادمن</span></th>
<?php else: ?>
<th><span class="badge badge-warning">مسئول </span>  </a></th>
<?php endif; ?>
<th><a href="/admin/admin/edit/<?php echo e($admin->id); ?>" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
<th><a href="/admin/admin/delete/<?php echo e($admin->id); ?>" class="btn btn-block btn-danger btn-flat"> حذف </a></th>



        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--<th>الاسم  </th>-->
        <!--    <th>الايميل </th>-->
        <!--    <th>النوع</th>-->
        <!--    <th>تعديل </th>-->
        <!--    <th>حذف </th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

<?php endif; ?>

<?php $__env->slot('footer'); ?>
<div class="col-lg-4">

<a  href="/admin/admin/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة مسئول  </a>
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
            },
            "search":"بحث:",
            "lengthMenu":     "النتائج_MENU_",
        },
      "info" : true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "autoWidth": false
    });
  });
</script>

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutDashboard.app',['title'=>'المسئولين'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>