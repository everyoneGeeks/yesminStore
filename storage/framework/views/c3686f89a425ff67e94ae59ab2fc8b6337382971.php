

<div class="card" style="display: inline-block;">
     <div class="pro-img">
          <a href="/product/info/<?php echo e($product->id); ?>"><img src="<?php echo e($product->main_image); ?>" style="height:148px;  width:245px"  alt="product"></a>
          <?php if(Carbon\Carbon::now()->greaterThanOrEqualTo(Carbon\Carbon::parse($product->created_at)) 
&& Carbon\Carbon::now()->lessThanOrEqualTo(Carbon\Carbon::parse($product->created_at)->addDays(3))): ?>
          <span class="status badge badge-primary"><?php echo e(App::getLocale() == 'ar' ? "جديد":"New"); ?></span>
          <?php endif; ?>
          <?php if($product->discount !== 0): ?>
          <span class="status badge badge-warning"><?php echo e($product->discount); ?>% -</span>
          <?php endif; ?>
     </div>
     <div class="pro-desc">
          <div class="pro-info">
               <a href="/product/info/<?php echo e($product->id); ?>">
               <h4 class="pro-name">
               <?php if(App::getLocale() == 'ar'): ?>
               <?php echo e($product->name_ar); ?>

               <?php else: ?> 
  
               <?php echo e($product->name_en); ?>

               <?php endif; ?>
               </h4></a>
               <span class="price">
               <span class="aft-dis">EGP <?php echo e($product->price - $product->price*$product->discount/100); ?></span>
               <span class="bef-dis">EGP <?php echo e($product->price); ?></span>
              
          </div>
          <div class="cart-view">
               <button form="AddTocart-<?php echo e($product->id); ?>"  type="submit" class="btn add-cart"><?php echo e(App::getLocale() == 'ar' ? "شراء":"Buy"); ?></button>
               <form id='AddTocart-<?php echo e($product->id); ?>' action="/product/add/cart/<?php echo e($product->id); ?>" method="get">
</form>
               <a  href="/product/info/<?php echo e($product->id); ?>" class="btn q-view"><span style="width:100%;text-align:center"><?php echo e(App::getLocale() == 'ar' ? "مشاهدة":"View"); ?></span></a>
             
               <?php if(auth()->guard('users')->check()): ?>
               <?php if(!$product->wishList->isEmpty()): ?>
               <a  href="/wishlist/delete/<?php echo e($product->id); ?>" class="btn fav"><i class="fas fa-heart"></i></a>
               <?php else: ?> 
               <a  href="/wishlist/add/<?php echo e($product->id); ?>" class="btn fav"><i class="far fa-heart"></i></a>

               <?php endif; ?>

               <?php endif; ?>

               <?php if(auth()->guard('users')->guest()): ?>
               <a  href="/wishlist/add/<?php echo e($product->id); ?>" class="btn fav"><i class="far fa-heart"></i></a>

               <?php endif; ?>

               
          </div>
     </div>
</div>


