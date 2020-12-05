<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dist/css/bootstrap-imageupload.min.css')); ?>">
<!-- font -->
<link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css"><link rel="stylesheet" href="<?php echo e(asset('dist/dist/jquery.fileuploader.min.css')); ?>">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.error',['errors'=>$errors ?? NULL]); ?> <?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('components.panel',['subTitle'=>'  تعديل  بيانات   المنتج ']); ?>
<div class="container-fluid">
        <div class="row">
        <div class="col-md-12 ">
<div class="text-center">

<img src="<?php echo e($product->main_image); ?>" width=150px>
</div>
          <div class="col-md-12 ">

          <form   
      role="form" action="<?php echo e(route('product.edit.submit',$product->id)); ?>" method="post" enctype="multipart/form-data" >
          <?php echo csrf_field(); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr"> الاسم المنتج عربي</label>
                    <input type="text" class="form-control" id="InputNameAr" value="<?php echo e($product->name_ar); ?>"  name="name_ar">
                  </div>


                  <div class="form-group">
                    <label for="InputNameEn"> الاسم  المنتج اجنبي</label>
                    <input type="text" class="form-control" id="InputNameEn"  value="<?php echo e($product->name_en); ?>" name="name_en">
                  </div>


                  <div class="form-group">
                    <label for="InputNameEn"> وصف  المنتج عربي</label>
                    <textarea  class="form-control"    name="description_ar">  <?php echo e($product->description_ar); ?>  </textarea>
                  </div>



                  <div class="form-group">
                    <label for="InputNameEn"> وصف  المنتج اجنبي</label>
                    <textarea  class="form-control"    name="description_en">  <?php echo e($product->description_en); ?>  </textarea>
                  </div>



                  <div class="form-group">
                    <label for="InputNameEn"> سعر  المنتج </label>
                    <input type="number" min=1 class="form-control" value="<?php echo e($product->price); ?>" id="InputNameEn"  name="price">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn"> الكمية المتاحة  المنتج </label>
                    <input type="number" min=1 class="form-control" id="InputNameEn" value="<?php echo e($product->amount); ?>"  name="amount">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn"> الخصم   المتاحة  المنتج </label>
                    <input type="number"  max=100 class="form-control" id="InputNameEn" value="<?php echo e($product->discount); ?>"  name="discount">
                  </div>


                  <div class="form-group">
                    <label for="InputNameAr">  القسم </label>
                    <select name="subcategory" id="category" class="form-control js-example-basic-single">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <optgroup label="<?php echo e($category->name_ar); ?>">
                    <?php $__currentLoopData = $category->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($product->sub_category_id ==$subcategory->id): ?>
                    <option  value="<?php echo e($subcategory->id); ?>" selected><?php echo e($subcategory->name_ar); ?></option>
                    <?php else: ?>  
                    <option  value="<?php echo e($subcategory->id); ?>"><?php echo e($subcategory->name_ar); ?></option>

                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </optgroup>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  </div>



                  <div class="form-group">
                    <label for="InputNameEn">   المناسبة </label>
                    <select name="occasions[]" class="form-control js-example-responsive" multiple="multiple" >
                    <?php $__currentLoopData = $occasions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occasion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
                    <?php if(in_array($occasion->id,Arr::pluck($product->occasion, 'id'))): ?>
                    <option value="<?php echo e($occasion->id); ?>" selected><?php echo e($occasion->name_ar); ?></option>
                    <?php else: ?>  
                    <option value="<?php echo e($occasion->id); ?>"><?php echo e($occasion->name_ar); ?></option>

                    <?php endif; ?>
              
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>



                  <div class="form-group">
                    <label for="InputNameEn">   الحجم  </label>
                    
                    <select name="size[]" class="form-control js-example-responsive" multiple="multiple" >
                    <?php $__currentLoopData = $size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   
                    <?php if(in_array($siz->id,Arr::pluck($product->size, 'id'))): ?>
                    <option value="<?php echo e($siz->id); ?>" selected><?php echo e($siz->name_ar); ?></option>
                    <?php else: ?>  
                    <option value="<?php echo e($siz->id); ?>"><?php echo e($siz->name_ar); ?></option>

                    <?php endif; ?>
                  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>



                  <div class="form-group">
                    <label for="InputNameEn">   الشخصيات  </label>
                    
                    <select name="characters[]" class="form-control js-example-responsive" multiple="multiple" >
                    <?php $__currentLoopData = $characters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $character): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   
                    <?php if(in_array($character->id,Arr::pluck($product->character, 'id'))): ?>
                    <option value="<?php echo e($character->id); ?>" selected><?php echo e($character->name_ar); ?></option>
                    <?php else: ?>  
                    <option value="<?php echo e($character->id); ?>"><?php echo e($character->name_ar); ?></option>

                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
                    </select>
                  </div>



                  <div class="form-group">
                    <label for="InputNameEn">   نوع الحفل   </label>
                    
                    <select name="Party_Theme[]" class="form-control js-example-responsive" multiple="multiple" >
                    <?php $__currentLoopData = $Party_Theme; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Party): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
                    <?php if(in_array($Party->id,Arr::pluck($product->party_theme, 'id'))): ?>
                    <option value="<?php echo e($Party->id); ?>" selected><?php echo e($Party->name_ar); ?></option>
                    <?php else: ?>  
                    <option value="<?php echo e($Party->id); ?>"><?php echo e($Party->name_ar); ?></option>

                    <?php endif; ?>
               
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>


                 
                  <?php if($product->url !== null): ?>
                  <li >
                       <span>             <iframe width="420" height="300" src="<?php echo e($product->url); ?>">
                                </iframe></span> <b class="float-right">  فيديو     </b>
                  </li>
                  <?php endif; ?>
                  <div class="form-group">
                    <label for="InputNameEn">   فيديو المنتج  </label>
                    <input type="url"  class="form-control" id="InputNameEn"  name="url">
                  </div>


                  <div class="form-group">

                    <label for="InputFile"> صوره الرائيسية للمنتج </label>
                    <div class="imageupload panel panel-default">
                  <div class="file-tab panel-body">
                      <label class="btn btn-default btn-file">
                          <span>اضافة </span>
                          <!-- The file is stored here. -->
                          <input type="file" name="main_image">
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
                  <div class="card-footer">
          <button type="submit" class="btn btn-primary">ارسال</button>
        </div>


                </div>
                <!-- /.card-body -->
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

      <?php $__env->startComponent('components.panel',['subTitle'=>'ادارة صور المنتج']); ?>


    <div class="col-lg-12">
<?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-lg-3" style="display:inline-block">
    <div class="thumbnail">
      <img src="<?php echo e($images->image); ?>" alt="..." width="150px" height="150px">
      <div class="caption">

        <p class="text-center" style="margin-top:10px">
        <form   
      role="form" action="<?php echo e(route('product.delete.image',$images->id)); ?>" method="post" enctype="multipart/form-data" >
          <?php echo csrf_field(); ?>
          <input type="hidden" name="action" value="delete" />

        <button type="submit" class="btn btn-danger"  role="button">حذف</button></p>
        </form>
      </div>
    </div>
  </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
      <form   
      role="form" action="<?php echo e(route('product.add.image',$product->id)); ?>" method="post" enctype="multipart/form-data" >
          <?php echo csrf_field(); ?>

      <div class="form-group">
            

            <div class="custom-file-container" data-upload-id="myUniqueUploadId">
    <label> اضافة صور للمنتج <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>

    <label class="custom-file-container__custom-file" >
        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="*" multiple aria-label="اضافة صور " name="images[]" >
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
        <span class="custom-file-container__custom-file__custom-file-control"></span>
    </label>
    <div class="custom-file-container__image-preview"></div>
</div>
                           </div>

                           <input type="hidden" name="action" value="add" />

                           <div class="card-footer">
          <button type="submit" class="btn btn-info">اضافة </button>
        </div>

        </form>

      <?php echo $__env->renderComponent(); ?>

 <?php $__env->stopSection(); ?>








 
        

 <?php $__env->startSection('javascript'); ?>
<!-- DataTables -->
<script src="<?php echo e(asset('dist/js/bootstrap-imageupload.js')); ?>"></script>

<script src="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.js"></script><script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- page script -->
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();

});
var upload = new FileUploadWithPreview('myUniqueUploadId',{
  showDeleteButtonOnImages: true,
                text: {
                    chooseFile: 'اضافة صور   ',
                    browse: '  اضافة صور ',
                    selectedCount: 'Custom Files Selected Copy',
                },
})

$('.imageupload').imageupload({
    allowedFormats: [ 'jpg', 'jpeg', 'png', 'gif'  ],
    maxFileSizeKb: 5000
});

$(".js-example-responsive").select2({
    width: 'resolve' // need to override the changed default
});




</script>


 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutDashboard.app',['title'=>'المنتجات '] , \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>