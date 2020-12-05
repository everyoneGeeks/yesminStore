<?php $__env->startSection('style'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.panel',['subTitle'=>' بيانات المستخدم']); ?>
<?php if($users->isEmpty()): ?>

<?php $__env->startComponent('components.empty',['section'=>'مستخدميين ']); ?> <?php echo $__env->renderComponent(); ?>

<?php else: ?> 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم  </th>
            <th>الايميل</th>
            <th> الصور</th>
            <th>الهاتف</th>
            <th>الحالة</th>
        </tr>
        </thead>
        <tbody>  
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
<th> <a href="/admin/user/info/<?php echo e($user->id); ?>"><?php echo e($user->name); ?></th>
<th> <?php echo e($user->email); ?></th>
<th><img src="<?php echo e(asset($user->image)); ?>" width=50px > </th>
<th> <?php echo e($user->phone); ?></th>
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
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

<?php endif; ?>
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
      "ordering": true,
      "autoWidth": false
    });
  });
</script>

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutDashboard.app',['title'=>'المستخدمين' ,'subTitle'=>'ادارة المستخدمين'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>