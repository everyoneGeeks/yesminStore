<?php $__env->startSection('style'); ?>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<style>
    * {
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
*:focus {
  outline: none;
}
body {
  font-family: Arial, Tahoma;
  font-size: 18px;
}
.page {
  display: flex;
}

.content {
  flex: 1;
  background-color: #f5f5f5;
}
.content .header {
  background-color: #fff;
  padding: 20px;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
.content .content-area {
  padding: 20px;
}
.content .content-area .stats-choose {
  padding: 20px;
  margin-bottom: 10px;
  background-color: #f9f9f9;
  text-align: center;
  font-size: 20px;
  font-weight: bold;
  display: flex;
  justify-content: center;
  align-items: center;
}
.content .content-area .stats-choose .special-select {
  margin-left: 10px;
  background-color: #fff;
  width: 200px;
  height: 40px;
  border: 1px solid #ccc;
  border-radius: 6px;
  position: relative;
}
.content .content-area .stats-choose .special-select select {
  -webkit-appearance: none;
  appearance: none;
  border: none;
  width: 198px;
  height: 38px;
  line-height: 40px;
  border-radius: 6px;
  padding: 0 13px;
  font-size: 16px;
  position: relative;
  z-index: 2;
  background: transparent;
}
.content .content-area .stats-choose .special-select:after {
  font-family: "Font Awesome 5 Free";
  content: "\f078";
  font-weight: 900;
  position: absolute;
  right: 15px;
  top: 50%;
  transform: translateY(-50%);
  z-index: 1;
  font-size: 12px;
  transition: 0.3s;
}
.content .content-area .stats-choose .special-select select:focus {
  outline: none;
}
.content .content-area .stats {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}
.content .content-area .stats .stat-box {
  flex-basis: 24%;
  background-color: #fff;
  padding: 20px;
  text-align: center;
  border: 1px solid #eee;
  border-radius: 4px;
  display: flex;
  align-items: center;
}
.content .content-area .stats .stat-box .data {
  flex-grow: 1;
  text-align: left;
  font-size: 15px;
  color: #666;
}
.content .content-area .stats .stat-box .data span {
  display: block;
  margin-bottom: 5px;
  font-size: 30px;
  color: #000;
  font-weight: bold;
}
.content .content-area .stats .stat-box .data-icon {
  color: #fff;
  padding: 10px;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.content .content-area .stats .stat-box .fa-eye {
  background-color: #ff5722;
}
.content .content-area .stats .stat-box .fa-store {
  background-color: #03a9f4;
}
.content .content-area .stats .stat-box .fa-money-bill-alt {
  background-color: #009688;
}
.content .content-area .stats .stat-box .fa-users {
  background-color: #3f51b5;
}
.content .content-area .stats .big-stat-box {
  flex-basis: 100%;
}
.settings .group {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.settings .group .switch-field {
  width: 110px;
}
.settings .group .title {
  font-weight: bold;
}
.settings .group .template {
  text-align: center;
  padding: 20px;
  background-color: #f8f8f8;
  flex-basis: 49.5%;
  font-size: 25px;
  line-height: 2;
  border: 3px solid #eee;
  cursor: pointer;
}
.settings .group .selected {
  border-color: #0075ff;
}
.settings .group .template i {
  font-size: 40px;
  margin: 20px 0;
}
.settings .group:not(:first-child) {
  margin-top: 20px;
}
.pages .page-area {
  background-color: #f8f8f8;
  padding: 20px;
  margin-bottom: 20px;
}
.pages .page-area .head {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
}
.pages .page-area .head h3 {
  margin: 0;
  flex-grow: 1;
}
.pages .page-area .head .save-message {
  text-align: right;
  color: #009688;
  font-weight: bold;
  padding-right: 10px;
  display: none;
  font-size: 14px;
  flex-grow: 1;
}
.pages .page-area textarea {
  padding: 15px;
  display: block;
  width: 100%;
  border: 1px solid #ccc;
  resize: none;
  border-radius: 6px;
  font-size: 18px;
}
.pages .page-area .faq-content {
  margin-bottom: 20px;
}
.pages .page-area .faq-content .q-a {
  background-color: #fff;
  padding: 20px;
  margin-bottom: 10px;
  position: relative;
}
.pages .page-area .faq-content .q-a .close {
  position: absolute;
  color: red;
  top: 10px;
  right: 10px;
  font-weight: bold;
  font-family: Arial, Tahoma;
  cursor: pointer;
  font-size: 18px;
}
.pages .page-area .faq-content .q-a h3 {
  margin-bottom: 10px;
}
.pages .page-area .faq-content .q-a p {
  font-size: 16px;
  color: #777;
  line-height: 1.6;
  margin-bottom: 0;
}
.pages .page-area .adding-new .question,
.pages .page-area .adding-new .answer {
  padding: 15px;
  display: block;
  width: 100%;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 18px;
  margin-bottom: 15px;
}
.pages .page-area .adding-new .answer {
  resize: none;
  height: 150px;
}
.pages .page-area .adding-new .add-faq {
  background-color: #e91e63;
  padding: 10px 20px;
  border-radius: 6px;
  font-size: 16px;
  font-weight: bold;
  color: #fff;
  cursor: pointer;
  width: 92px;
  display: block;
}
.pages .page-area .adding-new .add-faq i {
  font-size: 12px;
  position: relative;
  top: -1px;
  margin-right: 5px;
}
/* Start Helpers */
.hidden-content {
  display: none !important;
}
.main-box {
  padding: 20px;
  margin-top: 20px;
  background-color: #fff;
}


.switch-field {
  display: flex;
}
.switch-field input {
  -webkit-appearance: none;
  appearance: none;
  display: none;
}
.switch-field label {
  background-color: #e4e4e4;
  color: rgba(0, 0, 0, 0.6);
  font-size: 14px;
  line-height: 1;
  text-align: center;
  padding: 8px 16px;
  margin-right: -1px;
  border: 1px solid rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
  transition: all 0.1s ease-in-out;
}
.switch-field label:hover {
  cursor: pointer;
}
.switch-field input:checked + label {
  background-color: #0075ff;
  box-shadow: none;
  color: #fff;
}
.switch-field label:first-of-type {
  border-radius: 4px 0 0 4px;
}
.switch-field label:last-of-type {
  border-radius: 0 4px 4px 0;
}

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.error',['errors'=>$errors ?? NULL]); ?> <?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('components.panel',['subTitle'=>' غلق الويب سايت ']); ?>  
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">
    <form id="closeForm" action="<?php echo e(route('appSetting.close.edit')); ?>" method="post" enctype="multipart/form-data" class="settings main-box">
         <?php echo csrf_field(); ?>
            <div class="group">
              <div class="title">فتح المتجر    </div>
              <div class="switch-field open-mode">
                  
                <input type="radio" id="mode-yes" name="Close" value="yes" <?php echo e($appSetting->Close  == 'yes' ? 'checked' : ' '); ?> >
                <label for="mode-yes">نعم </label>
                <input type="radio" id="mode-no" name="Close" value="no" <?php echo e($appSetting->Close  == 'no' ? 'checked' : ' '); ?>>
                <label for="mode-no">لا </label>
              </div>
            </div>
            <input id="closeType" type="text" hidden name="closetype">
            
            <?php if($appSetting->Close  == 'no'): ?>
            <div class="group mode-templates " >
              <?php else: ?> 
                  <div class="group mode-templates hidden-content" >
                <?php endif; ?>
           
              <div class="<?php echo e($appSetting->CloseType == 1 ?   'template selected' : 'template '); ?>" data-id=1>
                <i class="fas fa-socks"></i>
                <p class="message">المتجر مغلق للصيانة ، تفضل بزيارتنا قريبا</p>
              </div>
              <div class="<?php echo e($appSetting->CloseType !== 1 ?   'template selected' : 'template '); ?>" data-id=2>
                <i class="fab fa-rocketchat"></i>
                <p class="message">المتجر مغلق لقضاء عطلة العيد ، تفضل بزيارتنا قريبًا</p>
              </div>
            </div>

          </form>

<!--          <form role="form" action="<?php echo e(route('appSetting.close.edit')); ?>" method="post" enctype="multipart/form-data">-->
<!--          <?php echo csrf_field(); ?>-->
<!--                <div class="card-body">-->
                  
<!--                <div class="checkbox">-->
<!--  <label>-->
<!--      <?php if($appSetting->Close  == '1'): ?>-->
<!--    <input type="checkbox" data-toggle="toggle"  value="0"  name="Close"  checked>-->
<!--    <?php else: ?> -->
    
<!--        <input type="checkbox" data-toggle="toggle"  value="1"  name="Close" >-->

<!--    <?php endif; ?>-->
<!--   <?php if($appSetting->Close == 0): ?>-->

<!--      تم غلق الويب سايت -->
<!--   <?php else: ?> -->

<!--تم فتح الويب سايت -->

<!--   <?php endif; ?>-->
<!--  </label>-->
<!--</div>-->


<!--                </div>-->
                <!-- /.card-body -->

<!--                <div class="card-footer">-->
<!--                  <button type="submit" class="btn btn-primary">ارسال</button>-->
<!--                </div>-->
<!--              </form>-->
              
              
              
              

              </div>
              <!-- /.card-body -->
             <button class="btn btn-info" type="submit" form="closeForm">
                save
            </button>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
      <?php echo $__env->renderComponent(); ?>



 <?php $__env->stopSection(); ?>



 <?php $__env->startSection('javascript'); ?>
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
 <script>
     $(function () {
         
  "use strict";
   $('#closeType').val(0);
  var modeTemplates = $(".mode-templates");
  $(".open-mode input").on("change", function () {
    if ($(this).val() === "no") {
      modeTemplates.removeClass("hidden-content");
    } else {
      modeTemplates.addClass("hidden-content");
    }
  });
  $(".mode-templates .template").on("click", function () {
    $(this).addClass("selected").siblings().removeClass("selected");
     $('#closeType').val($(this).data('id'));
     console.log( $('#closeType').val())
    
  });
  // Save Textarea on Blur
  $(".page-area textarea").on("blur", function () {
    $(this).prev(".head").find(".save-message").fadeIn(500).delay(1500).fadeOut(500);
  });
  // Add New FAQ
  $(".add-faq").on("click", function () {
    $(".faq-content").append(
      "<div class='q-a'><h3>" +
        $(".question").val() +
        "</h3><p>" +
        $(".answer").val() +
        "</p><span class='close'>x</span></div>"
    );
    $(".question, .answer").val("");
  });
  // Remove The Faq Box
  $("body").on("click", ".q-a .close", function () {
    $(this).parent().fadeOut();
  });
});

 </script>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutDashboard.app',['title'=>' غلق الويب سايت '], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>