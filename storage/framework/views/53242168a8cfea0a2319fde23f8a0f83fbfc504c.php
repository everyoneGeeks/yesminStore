<?php $__env->startSection('style'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.css')); ?>">
  <style>
  .highlight {
    background-color: #66d04461;
}
#example2_filter{
    float:left;
}
  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<?php $__env->startComponent('components.panel',['subTitle'=>'  المرتجع   ']); ?>
<?php if($orders->isEmpty()): ?>

<?php $__env->startComponent('components.empty',['section'=>'المرتجع ']); ?> <?php echo $__env->renderComponent(); ?>

<?php else: ?>

<table id="example2" class="table table-bordered table-hover example2">
        <thead>
        <tr>
        <th> رقم المرتجع  </th>
        <th> محتوي الشكوي  </th>
         <th> تاريخ الانشاء </th>
  
        </tr>
        </thead>
        <tbody>


<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<th><a href="/admin/returnOrder/info/<?php echo e($order->id); ?>"> <?php echo e($order->id); ?> </a></th>    
<th><?php echo e($order->subject); ?></th>
<th><?php echo e(Carbon\Carbon::parse($order->created_at)->format('Y-m-d')); ?></th>

</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        </table>

<?php endif; ?>

<?php echo $__env->renderComponent(); ?>




 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('javascript'); ?>
<!-- DataTables -->
<script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.js')); ?>"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.59/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.59/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>



<!-- page script -->

<script>

  $(function () {

    $('.example2').DataTable({

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
      "autoWidth": true,
        // "dom": 'Bfrtip',
        // "buttons": [ 'csv' ,'pageLength',
        // {
        //     extend: 'pdfHtml5',
        //     text: 'pdf',
        //     exportOptions: {
        //         modifier: {
        //             page: 'current'
        //         }}}]
    });
  });


</script>


 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutDashboard.app',['title'=>'المرتجع  '], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>