<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orders.css')); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.Websiteerror',['errors'=>$errors ?? NULL]); ?> <?php echo $__env->renderComponent(); ?>

<div class="cart-details">
            <div class="container">
                <div class="row">
            

                    <?php $__env->startComponent('components.userInfoDashboardList',['user'=>$user]); ?> <?php echo $__env->renderComponent(); ?>

                    
                    <div class="col-md-8">
                        <div class="orders">
                            <h3><img src="<?php echo e(asset('img/Cart-c.svg')); ?>" alt=""><?php echo e(App::getLocale()== 'ar' ? "الطلبات": "Orders"); ?></h3>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="order">
                                <div class="order-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6><?php echo e(App::getLocale()=='ar' ? "تاريخ الطلب ":"Order placed on"); ?>: <span> <?php echo e(\Carbon\Carbon::parse($order->created_at)->diffForHumans()); ?></span></h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6><?php echo e(App::getLocale() == 'ar'  ? "طريقة الدفع ": "Payment method"); ?>: <span>Credit or Debit Cards</span></h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6><?php echo e(App::getLocale() == 'ar' ? "رقم الطلب ": "Order ID"); ?>: <span>#<?php echo e($order->order_id); ?></span></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-body">
                                <?php $__env->startComponent('components.orderTrackingProgress',['statu'=>$order->status]); ?> <?php echo $__env->renderComponent(); ?>
                                    <div class="order-products">
                                    <?php $__currentLoopData = $order->orderProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="product">
                                            <div class="details">
                                                <img src="<?php echo e($product->main_image); ?>" alt="">
                                                <div class="product-name">
                                                    <h4><?php echo e(App::getLocale() == 'ar' ?  $product->name_ar: $product->name_en); ?></h4>

                                                    <div class="review">
                                                        <h6><?php echo e(App::getLocale() == 'ar' ? " قيم المنتج": "Rate this product"); ?>:</h6>
                                                  
                                                        <span>
                                                        <label for="recipient-name" class="col-form-label" style="color:#fb8abc"><?php echo e(App::getLocale() == "ar" ? "التقيم": "rate"); ?>:</label>
          
                                                        <?php if($product->rateProduct->where('product_id',$product->id)->where('user_id',Auth::guard('users')->user()->id)->first()): ?>

                                                        <form action="/product/update/rate/<?php echo e($product->rateProduct->where('product_id',$product->id)->where('user_id',Auth::guard('users')->user()->id)->first()->id); ?>" method="get">

                                                        <div class="rateYoUpdate"></div>
                                                       <input type="text" hidden   id="updateRate"  name="rateing" value="<?php echo e($product->rateProduct->where('product_id',$product->id)->where('user_id',Auth::guard('users')->user()->id)->first()->rate); ?>">
                                                  
                                                        </span>
                                                        <textarea name="comment" style="margin-bottom:0px;width: 221px;overflow: hidden;" placeholder="اضف اعليق">
                                                        <?php echo e($product->rateProduct->where('product_id',$product->id)->where('user_id',Auth::guard('users')->user()->id)->first()->comment); ?>

                                                      </textarea>
                                                      
                                                        <button style="
                                                            border: 2px solid #97e3f0;
                                                            border-radius: .5rem;
                                                            padding: .5rem;
                                                            margin-top: 1rem;
                                                            color: #4eb9cb;
                                                            font-weight: bold;
                                                            width: 100px;
                                                            float:left;
                                                            background-color: #fff;" 
                                                            type="submit" class="btn btn-primary" 
                                                            
                                                            ><?php echo e(App::getLocale()== 'ar'  ? ' قيم الان ':"update rate"); ?></button>
                                                    </div>
</form>
                                                    <?php else: ?>  
                                                    <form action="/product/rate/<?php echo e($product->id); ?>" method="get">

                                                    <div class="rateYo" data-value="0"></div>
                                                       <input type="text" hidden     name="rateing">
                                                  
                                                        </span>
                                                        <textarea name="comment" style="margin-bottom:0px;width: 221px;overflow: hidden;" placeholder="اضف اعليق">  </textarea>
                                                      
                                                        <button style="
                                                            border: 2px solid #97e3f0;
                                                            border-radius: .5rem;
                                                            padding: .5rem;
                                                            margin-top: 1rem;
                                                            color: #4eb9cb;
                                                            font-weight: bold;
                                                            width: 100px;
                                                            float:left;
                                                            background-color: #fff;" 
                                                            type="submit" class="btn btn-primary" 
                                                            
                                                            ><?php echo e(App::getLocale()== 'ar'  ? ' قيم الان ':"update rate"); ?></button>
                                                    </div>
</form>
                                                    <?php endif; ?>
                                                    <div class="" style="
    width: 317px;
"></div>
                                                </div>

                                                <div>
<?php if($product->pivot->is_complains !== 1 ): ?>
                                                <a href="#" data-toggle="modal" data-target="#exampleModal-add-COMPLAINT-<?php echo e($product->id); ?>-<?php echo e($order->id); ?>" data-whatever="@mdo" class="btn"><?php echo e(App::getLocale() == 'ar' ?  "تقديم شكوي": "FILE A COMPLAINT"); ?></a>
<div class="modal fade" id="exampleModal-add-COMPLAINT-<?php echo e($product->id); ?>-<?php echo e($order->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:#fb8abc"><?php echo e(App::getLocale() == 'ar' ? "  تقديم الشكوي  " : " FILE A COMPLAINT  "); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
    /* float: right; */
    /* display: flex; */
    margin-left: 0px;
">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/product/complaint/<?php echo e($order->id); ?>/<?php echo e($product->id); ?>" method="get">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" style="color:#fb8abc"><?php echo e(App::getLocale() == "ar" ? "رقم الهاتف ": "phone"); ?>:</label>

            <input type="number" class="form-control"  name="phone">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label" style="color:#fb8abc"><?php echo e(App::getLocale() == "ar" ? "الموضوع ": "subject"); ?>:</label>
            <textarea class="form-control" id="message-text" style="
    height: 200px;
" name="subject"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(App::getLocale() == 'ar' ? "اغلاق":"Close"); ?></button>
        <button type="submit" class="btn btn-primary"><?php echo e(App::getLocale() == 'ar' ? "حفظ ":"save"); ?></button>
        </form>

      </div>
    </div>
  </div>
</div>
<?php else: ?>

<h5 class="alert alert-success" style="
    font-size: 12px;
    font-weight: bold;
">  تم تقديم شكوي سيتم التواصل معك قريبا <h5>
<?php endif; ?>

<?php if(\Carbon\Carbon::parse($product->created_at)->greaterThan(\Carbon\Carbon::parse($product->created_at)->addDays(14)) == false): ?>
  <?php if($product->pivot->is_returning !== 1): ?>
<a data-toggle="modal" data-target="#exampleModal-add-returning-<?php echo e($product->id); ?>-<?php echo e($order->id); ?>" data-whatever="@mdo" class="btn"><?php echo e(App::getLocale() == "ar" ? "استرجاع المنتج " :"RETURN ITEM"); ?></a>
                                                    <div class="modal fade" id="exampleModal-add-returning-<?php echo e($product->id); ?>-<?php echo e($order->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:#fb8abc"><?php echo e(App::getLocale() == 'ar' ? "   استرجاع المنتج   " : " FILE A COMPLAINT  "); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
    /* float: right; */
    /* display: flex; */
    margin-left: 0px;
">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/product/returning/<?php echo e($order->id); ?>/<?php echo e($product->id); ?>" method="get">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" style="color:#fb8abc"><?php echo e(App::getLocale() == "ar" ? "رقم الهاتف ": "phone"); ?>:</label>

            <input type="number" class="form-control"  name="phone">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label" style="color:#fb8abc"><?php echo e(App::getLocale() == "ar" ? "إرسل لنا سبب رغبتك فى إرجاع المنتج وسيتم التواصل معك فى اقرب وقت ممكن  ": "subject"); ?>:</label>
            <textarea class="form-control" id="message-text" style="
    height: 200px;
" name="subject"></textarea>
          </div>
          <div class="alert alert-danger"> 

          ويرجى قراءة 
          <a href="/delivery/returns">           سياسة الإرجاع  </a>
          قبل تقديم الطلب 
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(App::getLocale() == 'ar' ? "اغلاق":"Close"); ?></button>
        <button type="submit" class="btn btn-primary"><?php echo e(App::getLocale() == 'ar' ? "حفظ ":"save"); ?></button>
        </form>

      </div>
    </div>
  </div>
</div>
<?php else: ?> 
<h5 class="alert alert-success" style="
    font-size: 12px;
    font-weight: bold;
">   سيتم التواصل معك قريبا <h5>
<?php endif; ?>
<?php else: ?> 


<?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                     
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                    </div>
                                </div>
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>
$(function () {
 
 $(".rateYo").rateYo({
   rating: 0,
   normalFill: "#A0A0A0",
   ratedFill: "#fb8abc",
   starWidth: "30px",
     fullStar: true,
     rtl: true

   
 }).on("rateyo.change", function (e, data) {
 
 var rating = data.rating;
 $(this).next().val(rating);
});



});

$(function () {
 var rate=$('.rateYoUpdate').next().val();
$(".rateYoUpdate").rateYo({
   rating: rate,
   normalFill: "#A0A0A0",
   ratedFill: "#fb8abc",
   starWidth: "30px",
   fullStar: true,
   rtl: true



   
 }).on("rateyo.change", function (e, data) {
 
 var rating = data.rating;
 $(this).next().val(rating);
});


});



</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layoutWebsite.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>