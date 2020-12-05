<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.error',['errors'=>$errors ?? NULL]); ?> <?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('components.panel',['subTitle'=>' ادارة الاعدادات']); ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="<?php echo e(route('appSetting.edit')); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr">  عن التطبيق بالعربي</label>
            
                    <textarea type="text" id="editor1" class="form-control ckeditor"   name="aboutus_ar">
                    <?php echo e($appSetting->aboutus_ar); ?>

                    </textarea>
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn">  عن التطبيق بالانجليزي</label>
                    <textarea type="text" id="editor2" class="form-control ckeditor"  name="aboutus">
                    <?php echo e($appSetting->aboutus); ?>

                    </textarea>
                  </div>

                  <div class="form-group">
                    <label for="InputNameAr">  سياسة التطبيق بالعربي</label>
                    <textarea type="text"  id="editor3" class="form-control ckeditor "  name="terms_policy_ar">
                    <?php echo e($appSetting->terms_policy_ar); ?>

                    </textarea>
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn">  سياسة التطبيق بالانجليزي </label>
                    <textarea type="text"  id="editor4" class="form-control ckeditor "  name="terms_policy">
                    <?php echo e($appSetting->terms_policy); ?>


                    </textarea>

                  </div>



                  <div class="form-group">
                    <label for="InputNameAr">  سياسة  الاسترجاع بالعربي </label>
                    <textarea type="text"  id="editor5" class="form-control ckeditor "  name="delivery_returns_ar">
                    <?php echo e($appSetting->delivery_returns_ar); ?>

                    </textarea>
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn">  سياسة الاسترجاع بالانجليزي </label>
                    <textarea type="text"  id="editor6" class="form-control ckeditor "  name="delivery_returns">
                    <?php echo e($appSetting->delivery_returns); ?>


                    </textarea>

                  </div>






                  <div class="form-group">
                    <label for="InputNameAr">    معلومات عن التوصيل بالانجليزي </label>
                    <textarea type="text"  id="editor7" class="form-control ckeditor "  name="delivery_info">
                    <?php echo e($appSetting->delivery_info); ?>

                    </textarea>
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn">   معلومات عن التوصيل بالعربي   </label>
                    <textarea type="text"  id="editor8" class="form-control ckeditor "  name="delivery_info_ar">
                    <?php echo e($appSetting->delivery_info_ar); ?>


                    </textarea>

                  </div>









                  <div class="form-group">
                    <label for="InputNameAr">  تواصل معنا  بالعربي</label>
                    <textarea type="text"  id="editor9" class="form-control ckeditor"  name="contactus_ar">
                    <?php echo e($appSetting->contactus_ar); ?>

                    </textarea>
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn">  تواصل معنا بالانجليزي  </label>
                    <textarea type="text"  id="editor10" class="form-control ckeditor"  name="contactus">
                    <?php echo e($appSetting->contactus); ?>


                    </textarea>

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
          
      <?php echo $__env->renderComponent(); ?>



 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('javascript'); ?>
 <script src="<?php echo e(asset('/plugins/ckeditor/ckeditor.js')); ?>"></script>

 <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor1'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      });
       
      }) ;
      



      $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor2'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      });
       
      }) ;
      



      $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor3'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      });
       
      }) ;
      




      $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor4'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      });
       
      }) ;
      



      $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor5'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      });
       
      }) ;
      




      $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor6'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      });
       
      }) ;



      $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor7'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      });
       
      }) ;




      $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor8'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      });
       
      }) ;
      
      
      
            $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor9'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      });
       
      }) ;
      
      
      
      
      
      
      
      
            $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor10'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      });
       
      }) ;
      

    </script>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutDashboard.app',['title'=>' الاعدادات'], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>