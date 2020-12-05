<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dist/css/bootstrap-imageupload.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.error',['errors'=>$errors ?? NULL]); ?> <?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('components.panel',['subTitle'=>'تعديل اعلان']); ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">
<div class="text-center">

<img src="<?php echo e(asset($ad->image)); ?>" width=150px height="150px">
</div>
          <form role="form" action="<?php echo e(route('ad.edit.submit',$ad->id)); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="card-body">

          
          <div class="form-group">
  <label for="InputNameAr">  تاريخ البداء</label>

  <input type="date" class="form-control" id="InputNameAr"  value="<?php echo e(Carbon\Carbon::parse($ad->start_from)->format('Y-m-d')); ?>" name="start_from">
</div>

<div class="form-group">
  <label for="InputNameAr">  تاريخ الانتهاء</label>
  <input type="date" class="form-control" id="InputNameAr"  value="<?php echo e(Carbon\Carbon::parse($ad->end_at)->format('Y-m-d')); ?>" name="end_at">
</div>

<div class="form-group">

<label for="InputFile"> صوره الاعلان</label>
<div class="imageupload panel panel-default">
<div class="file-tab panel-body">
  <label class="btn btn-default btn-file">
      <span>اضافة </span>
      <!-- The file is stored here. -->
      <input type="file" name="image">
  </label>

  <button type="button" class="btn btn-default">حذف</button>
</div>
<div class="url-tab panel-body">
  <div class="input-group">
      <input type="text" class="form-control" placeholder="Image URL">
  </div>
  <button type="button" class="btn btn-default">لالبابلابل</button>
  <!-- The URL is stored here. -->
  <input type="hidden" name="image">
</div>
</div>
</div>

<div class="form-group">
<label for="InputNameAr">  اللغة </label>
<select name="lang" id="category" class="form-control">
<?php if($ad->lang ='ar'): ?>
<option value="ar" selected >عربي</option>
<option value="en">اجنبي</option>
<?php else: ?>
<option value="ar"  >عربي</option>
<option value="en" selected>اجنبي</option>
<?php endif; ?>
</select>
</div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
              </form>
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

 <?php $__env->startSection('javascript'); ?>
<!-- DataTables -->
<script src="<?php echo e(asset('dist/js/bootstrap-imageupload.js')); ?>"></script>
<!-- page script -->
<script>
$('.imageupload').imageupload({
    allowedFormats: [ 'jpg', 'jpeg', 'png', 'gif'  ],
    maxFileSizeKb: 5000
});
</script>

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutDashboard.app',['title'=>'الاعلانات'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>