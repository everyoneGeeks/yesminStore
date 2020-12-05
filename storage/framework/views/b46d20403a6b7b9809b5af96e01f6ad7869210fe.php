<?php $__env->startSection('style'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.panel',['subTitle'=>' ادارة المناسبات']); ?>
<?php if($occasions->isEmpty()): ?>

<?php $__env->startComponent('components.empty',['section'=>'المناسبات ']); ?> <?php echo $__env->renderComponent(); ?>

<?php else: ?> 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم بالعربي </th>
            <th>الاسم بالانجنبي</th>
            <th>الافعال</th>
        </tr>
        </thead>
        <tbody>  
<?php $__currentLoopData = $occasions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occasion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
<th> <a href="/admin/occasion/info/<?php echo e($occasion->id); ?>"><?php echo e($occasion->name_ar); ?></a></th>
<th><a href="/admin/occasion/info/<?php echo e($occasion->id); ?>"> <?php echo e($occasion->name_en); ?></a></th>
<th><a href="/admin/occasion/edit/<?php echo e($occasion->id); ?>" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
<th><a href="/admin/occasion/delete/<?php echo e($occasion->id); ?>" class="btn btn-block btn-danger btn-flat"> حذف </a></th>


        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--<th>الاسم بالعربي </th>-->
        <!--    <th>الاسم بالانجنبي</th>-->
        <!--    <th>الافعال</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

<?php endif; ?>

<?php $__env->slot('footer'); ?>
<div class="col-lg-4">

<a  href="/admin/occasion/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة  مناسبة   </a>
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
      "ordering": true,
      "autoWidth": false
    });
  });
</script>

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutDashboard.app',['title'=>'المناسبات '], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>