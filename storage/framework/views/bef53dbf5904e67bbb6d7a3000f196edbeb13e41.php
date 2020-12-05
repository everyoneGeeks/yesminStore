<?php $__env->startSection('style'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" />
<link rel="stylesheet" href="<?php echo e(asset('css/product-details.css')); ?>">
  
  <?php if(App::getLocale() == 'en' ): ?>
  <style>
      .image-gallery .slick-next {
    background: none;
    color: #f86eac;
    border: none;
    position: relative;
    right: 18px;
    top: -60px;
    font-size: 20px;
    font-weight: bold;
      
  </style>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="product-details">
            <div class="container">
                <div class="details-tabs">
                    <div class="details">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="Main_images zoom "> 
                                   
                                   <img  data-lazy="<?php echo e(asset($product->main_image)); ?>" class="ImagesZoom"  alt="product-image"  style="width:100%;display: inline-block;opacity: 1;height: 356px;">
                                   <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <img data-lazy="<?php echo e(asset($image->image)); ?>" class="ImagesZoom"  alt="#" style="width:100%;display: inline-block;opacity: 1;height: 356px;">

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <div class="image-gallery">
                                <img  data-lazy="<?php echo e(asset($product->main_image)); ?>" alt="product-image" style="width: 100%;display: inline-block;opacity: 1;height: 88px;margin-top: 10px; " >

                                    <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <img data-lazy="<?php echo e(asset($image->image)); ?>" alt="#" style="width: 100%;display: inline-block;opacity: 1;height: 88px;margin-top: 10px; ">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                
                                <iframe width="420" height="300" src="<?php echo e($product->url); ?>">
                                </iframe>
                            </div>
                            <div class="col-md-6">
                                <h4 class="pro-name"><?php echo e(App::getLocale() == 'ar' ?  $product->name_ar: $product->name_en); ?></h4>
                                <div class="price">
                                    <?php if($product->discount !== 0 ): ?>
                                    <span class="aft-dis"><?php echo e(App::getLocale() =='ar' ?  "جنيه":"Eg"); ?>   <?php echo e($product->price - $product->price*$product->discount/100); ?></span>
                                    <span class="bef-dis"><?php echo e(App::getLocale() =='ar' ?  "جنيه":"Eg"); ?>  <?php echo e($product->price); ?></span>
                                    <span class="discount"><?php echo e(App::getLocale() == 'ar' ?' ': '-'); ?><?php echo e($product->discount); ?>% <?php echo e(App::getLocale() == 'en' ?' ': '-'); ?></span>
                                    <?php else: ?> 
                                    <span class="aft-dis"><?php echo e(App::getLocale()=='ar' ?  "جنيه":"Eg"); ?>  <?php echo e($product->price); ?></span>
                                    <?php endif; ?>
                                </div><hr>

                                <?php if(!$product->character->isEmpty()): ?>
                                <div class="character">
                                    <h5><?php echo e(App::getLocale() == 'ar' ? "الرسومات" : "character"); ?></h5>
                                    <div class="center-on-page">
                                    <div class="select">
                                    <select form="addToCart" name="character_id"  id="slct">
                                        <?php $__currentLoopData = $product->character; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $character): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      
                                        <option value="<?php echo e($character->id); ?>"><?php echo e(App::getLocale() == 'ar'? $character->name_ar:$character->name_en); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                    </select>
                                    </div>
                                    </div>

                                </div>
                                <?php endif; ?>

                                <?php if(!$product->occasion->isEmpty()): ?>
                                <div class="size">
                                    <h5><?php echo e(App::getLocale() == 'ar' ? "المناسبة / الحدث" : "Event / Occasion"); ?></h5>
                                    <div class="center-on-page">
                                    <div class="select">
                                    <select form="addToCart" name="occasion_id"   id="inputGroupSelect03">
                                        <?php $__currentLoopData = $product->occasion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occasion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      
                                        <option value="<?php echo e($occasion->id); ?>"><?php echo e(App::getLocale() == 'ar'? $occasion->name_ar:$occasion->name_en); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                    </select>
                                </div>
                                </div>
                                </div>
                                <?php endif; ?>


                                <?php if(!$product->party_theme->isEmpty()): ?>
                                <div class="size">
                                    <h5><?php echo e(App::getLocale() == 'ar' ? "نوع الحفلة " : "party theme"); ?></h5>
                                    <div class="center-on-page">
                                    <div class="select">
                                    <select form="addToCart" name="party_theme_id"  id="inputGroupSelect03">
                                        <?php $__currentLoopData = $product->party_theme; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $party_theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($party_theme->id); ?>"><?php echo e(App::getLocale() == 'ar' ? $party_theme->name_ar:$party_theme->name_en); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                    </select>
                                </div>
                                </div>
                                </div>
                                <?php endif; ?>
                                <?php if(!$product->size->isEmpty()): ?>
                                <div class="size">
                                    <h5><?php echo e(App::getLocale() == 'ar' ? " الحجم" : "size "); ?></h5>
                                    <div class="center-on-page">
                                    <div class="select">
                                    <select form="addToCart" name="size_id"   id="inputGroupSelect03">
                                        <?php $__currentLoopData = $product->size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($size->id); ?>"><?php echo e(App::getLocale() == 'ar' ? $size->name_ar:$size->name_en); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                </div>

                                </div>
                                <?php endif; ?>
                                <div class="quantity">
                                    <span class="qun"><label for="quantity"><?php echo e(App::getLocale() == 'ar' ? " الكمية ":"QTY"); ?></label>
                                    <input type="number" style="
    font-size: 22px;
    width: 125px;
        height: 30px;
" form="addToCart"  name="amount" id="quantity" min="0" max="<?php echo e($product->amount); ?>">
                                    </span>
                                    <span class="availability" style="width: 150px;display: inline-block;line-height: 1.8;"> 
                                    <?php if($product->amount <=3 ): ?> 
                                    <?php echo e(App::getLocale() == 'ar' ? $product->amount."    قطع متوفرة فقط ":"In stock".$product->amount); ?> </span>

                                    <?php elseif($product->amount <=2): ?>
                                    <?php echo e(App::getLocale() == 'ar' ? $product->amount."   قطعة متوفرة فقط   ":"In stock".$product->amount); ?> </span>
                                    <?php else: ?> 
                                    <?php echo e(App::getLocale() == 'ar' ? $product->amount."  في المخزن":"In stock".$product->amount); ?> </span>
                                    <?php endif; ?>

                                </div>
                                
                                <hr>

                                <div class="add" style="
    font-size: 22px;
">
                                <form id="addToCart" action="/cart/add/<?php echo e($product->id); ?>" method="get">
                                    <button style="
    color: white;
      font-size: 22px;
" type="submit" class="btn add-cart"><img src="<?php echo e(asset('img/cart.svg')); ?>" alt=""> <?php echo e(App::getLocale() == 'ar' ? " أضف إلى العربة":"Add To Cart"); ?></button>
                                    </form>
                                    <?php if(auth()->guard('users')->check()): ?>
               <?php if(!$product->wishList->isEmpty()): ?>
               <a href="/wishlist/delete/<?php echo e($product->id); ?>" class="wishlist"><i class="fas fa-heart"></i><?php echo e(App::getLocale() == 'ar' ? "  أضف إلى الرغبات ":"Add To Wishlist"); ?></a>
               <?php else: ?> 
               <a href="/wishlist/add/<?php echo e($product->id); ?>" class="wishlist"><i class="far fa-heart"></i><?php echo e(App::getLocale() == 'ar' ? "   أضف إلى الرغبات  ":"Add To Wishlist"); ?></a>

               <?php endif; ?>

               <?php endif; ?>

               <?php if(auth()->guard('users')->guest()): ?>
               <a href="/wishlist/add/<?php echo e($product->id); ?>" class="wishlist"><i class="far fa-heart"></i><?php echo e(App::getLocale() == 'ar' ? "    أضف إلى الرغبات ":"Add To Wishlist"); ?></a>

               <?php endif; ?>

                                </div><hr>

                                <div class="brief-desc">
                                    <h4> <?php echo e(App::getLocale() == 'ar' ? " وصف المنتج  ":"Product Details"); ?></h4>
                                    <p> <?php echo e(App::getLocale() == 'ar' ?  $product->description_ar: $product->description_en); ?></p>

                                    <p class="share"><?php echo e(App::getLocale() == 'ar' ?  "  مشاركة ": "Share "); ?>:
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url()->current()); ?>&amp;src=sdkpreparse"
   class="fb-xfbml-parse-ignore">
  <img src="<?php echo e(asset('img/pFacebook svg.svg')); ?>" alt="">
  </a>

  <a href="https://www.pinterest.com/pin/create/button/" data-pin-custom="true" data-pin-do="buttonBookmark">
  <img src="<?php echo e(asset('img/pPinterest.svg')); ?>" alt="">
</a>
                                 
                                     </p>

  

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">...</div-->
                    <div class="reviews">
                        <h3><?php echo e(App::getLocale() == 'ar' ?  " التقييمa": "Reviews"); ?></h3>
                        <div class="row avg-rating">
                            <div class="col-md-4">
                        
                                <h2 style="font-size: 20px;font-weight: bold;">  <?php echo e($product->rateProduct->count()); ?> <?php echo e(App::getLocale() == 'ar' ?  " عدد التقييمات": "Customer Reviews"); ?></h2>
                                <?php if($product->rateProduct->count() !==0): ?>
                                <?php $__env->startComponent('components.rate',['rate'=>$product->rateProduct->sum('rate') / $product->rateProduct->count()]); ?> <?php echo $__env->renderComponent(); ?>
                                <?php else: ?> 
                                <?php $__env->startComponent('components.rate',['rate'=>0]); ?> <?php echo $__env->renderComponent(); ?>
                                <?php endif; ?>
                                <span class="overall-rating" style="font-size: 20px;font-weight: bold;">   <?php echo e($product->rateProduct->count() == 0  ?  0: $product->rateProduct->sum('rate') /$product->rateProduct->count()); ?> <?php echo e(App::getLocale() == 'ar' ?  "  التقيم العام": "Overall rating"); ?></span>
                            </div>
                            
                            <div class="col-md-8">
                                <div class="star-numbers" style="width: 70%;">
                                    <div class="star-number" >
                                        <span style="font-size: 20px;font-weight: bold;">5</span>
                                        <i  style="
    position: relative;
    bottom: 3px;
    margin-left: 7px;
" class="fas fa-star"></i>
                                    </div>
                                    <div class="w-100">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: <?php echo e($product->rateProduct->where('rate',5)->count()*$product->rateProduct->count()*100); ?>%" aria-valuenow="<?php echo e($product->rateProduct->where('rate',5)->count()*$product->rateProduct->count()/100); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="rating-number" style="font-size: 20px;font-weight: bold;padding-right: 15px;"><?php echo e($product->rateProduct->where('rate',5)->count()); ?></span>
                                </div>
                                <div class="star-numbers" style="width: 70%;">
                                    <div class="star-number">
                                        <span style="font-size: 20px;font-weight: bold;">4</span>
                                        <i style="
    position: relative;
    bottom: 3px;
    margin-left: 7px;
" class="fas fa-star"></i>
                                    </div>
                                    <div class="w-100">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: <?php echo e($product->rateProduct->where('rate',4)->count()*$product->rateProduct->count()*100); ?>%" aria-valuenow="<?php echo e($product->rateProduct->where('rate',4)->count()*$product->rateProduct->count()/100); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="rating-number" style="font-size: 20px;font-weight: bold;padding-right: 15px;"><?php echo e($product->rateProduct->where('rate',4)->count()); ?></span>
                                </div>
                                <div class="star-numbers" style="width: 70%;">
                                    <div class="star-number">
                                        <span style="font-size: 20px;font-weight: bold;">3</span>
                                        <i style="
    position: relative;
    bottom: 3px;
    margin-left: 7px;
"  class="fas fa-star"></i>
                                    </div>
                                    <div class="w-100">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: <?php echo e($product->rateProduct->where('rate',3)->count()*$product->rateProduct->count()*100); ?>%" aria-valuenow="<?php echo e($product->rateProduct->where('rate',3)->count()*$product->rateProduct->count()/100); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="rating-number" style="font-size: 20px;font-weight: bold;padding-right: 15px;"><?php echo e($product->rateProduct->where('rate',3)->count()); ?></span>
                                </div>
                                <div class="star-numbers" style="width: 70%;">
                                    <div class="star-number">
                                        <span style="font-size: 20px;font-weight: bold;">2</span>
                                        <i style="
    position: relative;
    bottom: 3px;
    margin-left: 7px;
" class="fas fa-star"></i>
                                    </div>
                                    <div class="w-100">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: <?php echo e($product->rateProduct->where('rate',2)->count()*$product->rateProduct->count()*100); ?>%" aria-valuenow="<?php echo e($product->rateProduct->where('rate',2)->count()*$product->rateProduct->count()/100); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="rating-number" style="font-size: 20px;font-weight: bold;padding-right: 15px;"><?php echo e($product->rateProduct->where('rate',2)->count()); ?></span>
                                </div>
                                <div class="star-numbers" style="width: 70%;">
                                    <div class="star-number">
                                        <span style="font-size: 20px;font-weight: bold;">1</span>
                                        <i style="
    position: relative;
    bottom: 3px;
    margin-left: 7px;
" class="fas fa-star"></i>
                                    </div>
                                    <div class="w-100">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: <?php echo e($product->rateProduct->where('rate',1)->count()*$product->rateProduct->count()*100); ?>%" aria-valuenow="<?php echo e($product->rateProduct->where('rate',1)->count()*$product->rateProduct->count()/100); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="rating-number" style="font-size: 20px;font-weight: bold;padding-right: 15px;"><?php echo e($product->rateProduct->where('rate',1)->count()); ?></span>
                                </div>
                            </div>
                        </div><hr>
                        <div class="reviews">
                            <div class="row">
                            <?php $__currentLoopData = $rateProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6">
                                    <div class="customer-reviews">
                                        <div class="customer-info">
                                            <div class="main-cust-info">
                                                <img src="<?php echo e(asset($rate->user->image)); ?>" alt="">
                                               
                                                <div class="sub-info">
                                                    <h5 class="name"><?php echo e($rate->user->first_name); ?></h5>
                                                    <?php $__env->startComponent('components.rate',['rate'=>$rate->rate]); ?> <?php echo $__env->renderComponent(); ?>
                                                    <p><?php echo e($rate->comment); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                    <hr>
                                </div>
                            
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-12">
                                <?php echo e($rateProduct->links('vendor.pagination.default')); ?>

</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="product-cards">
            <div class="container">
                <h4 style="
    margin-top: -11px;
"><?php echo e(App::getLocale() == 'ar' ?  "منتجات مشابهة ": "RELATED PRODUCTS"); ?></h4>
                <div class="top-selling">   
                    
                <?php $__currentLoopData = $RelatedProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__env->startComponent('components.product',['product'=>$product]); ?> <?php echo $__env->renderComponent(); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>  
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection("javascript"); ?>
<script
    type="text/javascript"
    async defer
    src="//assets.pinterest.com/js/pinit.js"
></script>


       <script src="<?php echo e(asset('js/jquery.zoom.min.js')); ?>"></script>

	<script>
$(document).ready(function(){
  $('.zoom')
    .zoom({ on:'click' });	
    console.log('ssss');
});
	</script> 
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutWebsite.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>