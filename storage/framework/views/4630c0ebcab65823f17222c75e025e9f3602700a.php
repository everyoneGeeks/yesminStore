<?php $__env->startSection('style'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.panel',['subTitle'=>' ادارة المنتجات']); ?>
<?php if($products->isEmpty()): ?>

<?php $__env->startComponent('components.empty',['section'=>'المنتجات ']); ?> <?php echo $__env->renderComponent(); ?>

<?php else: ?> 

<table id="example2" class="table table-bordered table-hover ">
        <thead>
        <tr>
            <th>الاسم بالعربي </th>
            <th>القسم  </th>
            <th>القسم  الفرعي </th>
            <th>  السعر  </th>
            <th>  الكمية  </th>
            <th>  الخصم  </th>
            <th> الصور</th>
            <th>الافعال</th>
            <th> حذف</th>
        </tr>
        </thead>
        <tbody>  

<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
<th> <a href="/admin/product/info/<?php echo e($product->id); ?>"><?php echo e($product->name_ar); ?></a></th>
<th><a href="/admin/category/info/<?php echo e($product->category->id); ?>"> <?php echo e($product->category->name_ar); ?></a></th>
<th><a href="/admin/subcategory/info/<?php echo e($product->subcategory->id); ?>"> <?php echo e($product->subcategory->name_ar); ?></a></th>
<th><?php echo e($product->price); ?> </th>
<th><?php echo e($product->amount); ?> </th>
<th><?php echo e($product->discount); ?> </th>
<th><img src="<?php echo e(asset($product->main_image)); ?>" width=50px > </th>
<th><a href="/admin/product/edit/<?php echo e($product->id); ?>" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
<th><a href="/admin/product/delete/<?php echo e($product->id); ?>" class="btn btn-block btn-danger btn-flat"> حذف </a></th>

        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
        </tbody>
        <!--<tfoot>-->
        <!--<tr>-->
        <!--<th>الاسم بالعربي </th>-->
        <!--    <th>الاسم بالانجنبي</th>-->
        <!--    <th> الصور</th>-->
        <!--    <th>الافعال</th>-->
        <!--</tr>-->
        <!--</tfoot>-->
        </table>

<?php endif; ?>

<?php $__env->slot('footer'); ?>
<div class="col-lg-4">

<a  href="/admin/product/add" class="btn btn-block btn-success btn-lg">
 <i class="fa fa-plus" aria-hidden="true"></i> اضافة  منتج  </a>
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
<?php echo $__env->make('layoutDashboard.app',['title'=>'المنتجات '], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>