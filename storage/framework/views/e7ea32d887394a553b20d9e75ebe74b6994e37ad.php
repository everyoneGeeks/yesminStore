<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/shopping-cart.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.Websiteerror',['errors'=>$errors ?? NULL]); ?> <?php echo $__env->renderComponent(); ?>
<div class="cart-details">
            <div class="container">
            <?php if($carts->isEmpty()): ?>
                            <?php $__env->startComponent('components.emptyWebsite',['sectionِAr'=>'  عربة التسوق ','sectionِEn'=>'cart','emptyCart'=>'cart']); ?> <?php echo $__env->renderComponent(); ?>
                            <?php else: ?> 

                <div class="row">
              
                    <div class="col-md-7">

                    <h2><img src="<?php echo e(asset('img/Cart-c.svg')); ?>" alt=""><?php echo e(App::getLocale() == 'ar' ? "  عربة التسوق ": "your shopping cart"); ?></h2>

                    
                    
                    <?php $__env->startComponent('components.orderProgress',['statu'=>0]); ?> <?php echo $__env->renderComponent(); ?>
                    
   
                        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-cart-details">
                            <div class="img-section">
                                <img src="<?php echo e(asset($cart->product->main_image)); ?>" alt="">
                                <div>
                                    <a href="/product/info/<?php echo e($cart->product->id); ?>"><?php echo e(App::getLocale() == 'ar' ? $cart->product->name_ar: $cart->product->name_en); ?></a>
                                    <div class="price">
                                    <?php if($cart->discount > 0): ?>
                                    <span class="aft-dis">EGP <?php echo e($cart->price - $cart->price*$cart->discount/100); ?></span>
                                    <span class="bef-dis">EGP <?php echo e($cart->price); ?></span>
                                    <span class="discount"><?php echo e($cart->discount); ?>% off </span>
                                    <?php else: ?> 
                           
                                    <span class="aft-dis">EGP <?php echo e($cart->price); ?></span>
                                    <?php endif; ?>
                                    </div>
                          
                                    <?php if($cart->character): ?>
                                    <div class="character">
                                        <h5><?php echo e(App::getLocale() == 'ar' ? "الروسومات": "characters"); ?>: <span><?php echo e(App::getLocale() == 'ar' ? $cart->character->name_ar:$cart->character->name_en); ?></span></h5>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($cart->occasion): ?>
                                    <div class="character">
                                        <h5><?php echo e(App::getLocale() == 'ar' ? "المناسبة": "occasion"); ?>: <span><?php echo e(App::getLocale() == 'ar' ? $cart->occasion->name_ar:$cart->occasion->name_en); ?></span></h5>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($cart->party_theme): ?>
                                    <div class="character">
                                        <h5><?php echo e(App::getLocale() == 'ar' ? "نوع الحفلة ": "party_theme"); ?>: <span><?php echo e(App::getLocale() == 'ar' ? $cart->party_theme->name_ar:$cart->party_theme->name_en); ?></span></h5>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($cart->size): ?>
                                    <div class="size">
                                        <h5><?php echo e(App::getLocale() == 'ar' ? "الحجم": "size"); ?>: <span><?php echo e(App::getLocale() == 'ar' ? $cart->size->name_ar:$cart->size->name_en); ?></span></h5>
                                    </div>
                                    <?php endif; ?>



                                    <div class="quantity">
                                        <h5> <?php echo e(App::getLocale() == 'ar' ? "الكمية": "QUANTITY"); ?> : <span><?php echo e($cart->amount); ?></span></h5>
                                    </div>

                            
                                    <a type="button" class="edit" data-toggle="modal" data-target="#myModal-<?php echo e($cart->id); ?>">
                                    <i class="far fa-edit"></i><?php echo e(App::getLocale() == 'ar'  ?  "تعديل " : "Edit"); ?> </a>
                                    <hr>

                                <!-- update Cart -->
                                <div class="modal fade" id="myModal-<?php echo e($cart->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel"><?php echo e(App::getLocale() == 'ar'?  "تحديث السله " : "update cart"); ?></h4>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <form id="update-cart-<?php echo e($cart->id); ?>" action="/cart/update/<?php echo e($cart->id); ?>" method="get" >

                                    <?php if($cart->character): ?>
                                <div class="character">
                                    <h5 style="display: inline;"><?php echo e(App::getLocale() == 'ar' ? "الرسومات" : "character"); ?></h5>
                                    <div class="center-on-page" style="display: inline-block;margin-left: 100px;">
                                    <select form="update-cart-<?php echo e($cart->id); ?>" name="character_id" class="custom-select form-control" id="inputGroupSelect03 ">
                                        <option selected value=" ">Mini...</option>
                                        
                                        <?php $__currentLoopData = $cart->product->character; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $character): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      
                                        <option value="<?php echo e($character->id); ?>"><?php echo e(App::getLocale() == 'ar'? $character->name_ar:$character->name_en); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                    </select>
                                </div>
                                </div>
                                

                                <?php endif; ?>

                                <?php if($cart->occasion): ?>
                                <div class="size">
                                    <h5 style="display: inline;"><?php echo e(App::getLocale() == 'ar' ? "المناسبة / الحدث" : "Event / Occasion"); ?></h5>
                                    <div class="center-on-page" style="display: inline-block;margin-left: 35px;margin-top: 20px;">
                                    <select form="aupdate-cart-<?php echo e($cart->id); ?>" name="occasion_id"  class="custom-select form-control" id="inputGroupSelect03" >
                                        <option selected value="">Mini...</option>
                                        <?php $__currentLoopData = $cart->product->occasion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occasion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      
                                        <option value="<?php echo e($occasion->id); ?>"><?php echo e(App::getLocale() == 'ar'? $occasion->name_ar:$occasion->name_en); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                    </select>
                                </div>
                                </div>

                                <?php endif; ?>


                                <?php if($cart->party_theme): ?>
                                <div class="size">
                                    <h5 style="display: inline;"><?php echo e(App::getLocale() == 'ar' ? "نوع الحفلة " : "party theme"); ?></h5>
                                    <div class="center-on-page" style="display: inline-block;margin-left: 100px;">
                                    <select form="update-cart-<?php echo e($cart->id); ?>" name="party_theme_id" class="custom-select form-control" id="inputGroupSelect03">
                                        <option selected value="">Mini...</option>
                                        <?php $__currentLoopData = $cart->product->party_theme; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $party_theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($party_theme->id); ?>"><?php echo e(App::getLocale() == 'ar' ? $party_theme->name_ar:$party_theme->name_en); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                    </select>
                                </div>
                                </div>

                                <?php endif; ?>
                                <?php if($cart->size): ?>
                                <div class="size">
                                    <h5 style="display: inline;"><?php echo e(App::getLocale() == 'ar' ? " الحجم" : "size "); ?></h5>
                                    <div class="center-on-page" style="display: inline-block;margin-left: 148px;margin-top: 20px;">
                                    <select form="update-cart-<?php echo e($cart->id); ?>" name="size_id"  class="custom-select form-control" id="inputGroupSelect03">
                                        <option selected value="">Mini...</option>
                                        <?php $__currentLoopData = $cart->product->size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($size->id); ?>"><?php echo e(App::getLocale() == 'ar' ? $size->name_ar:$size->name_en); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                </div>

                                <?php endif; ?>
                                <div class="quantity" style="margin-top: 20px;">
                                    <span class="qun"><label for="quantity"><?php echo e(App::getLocale() == 'ar' ? "":"QTY"); ?></label>
                                    <input type="number" form="update-cart-<?php echo e($cart->id); ?>"  name="amount" id="quantity" min="0" max="<?php echo e($cart->product->amount); ?>">
                                    </span>
                                    <span class="availability" style="
    background-color: #51bb74;
    color: #fff;
    padding: 0 .7rem;
    border-radius: .3125rem;
    font-size: 18px;
    font-weight: 500;
"> <?php echo e(App::getLocale() == 'ar' ? "في المخزن":"In stock"); ?> <?php echo e($cart->product->amount); ?></span>
                                </div>                                

                             
                                    </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" style="
    background-color: #70d0e0;
    color: #fff;
    margin: 1rem 0;
    border-radius: 1rem;
    margin-right: 100px;
" class="btn btn-default" data-dismiss="modal"><?php echo e(App::getLocale() == 'ar' ? "اغلاق":"Close"); ?></button>
                                        <button type="submit" style="
    background-color: #70d0e0;
    color: #fff;
    margin: 1rem 0;
    border-radius: 1rem;
    margin-right: 70px;
" form="update-cart-<?php echo e($cart->id); ?>" class="btn btn-primary"> <?php echo e(App::getLocale() == 'ar' ? "حفظ":"Save changes"); ?></button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <!-- end update Cart -->


      
                                    <div class="personalize   <?php echo e($cart->personalize == '1' ? 'checked' :'unchecked'); ?> " id='personalize-<?php echo e($cart->id); ?>'>
                                        <span><?php echo e(App::getLocale() == 'ar' ? "تخصيص الطلب":"Personalize your order"); ?></span>

                                        <input type="text" form="addpersonalize" class="form-control age" name="id[]" value="<?php echo e($cart->id); ?>"  hidden>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="check_id-<?php echo e($cart->id); ?>"                                                   value="<?php echo e($cart->id); ?>"
                                                  onchange="updateCart(this)"  
                                                  data-id="personalize-<?php echo e($cart->id); ?>"
                                               form="addpersonalize"
                                                name="personalize[]" <?php echo e($cart->personalize == "1" ? "checked" :""); ?> >
                                                    <label class="custom-control-label" for="check_id-<?php echo e($cart->id); ?>"><?php echo e(App::getLocale() == 'ar' ? "":"ON"); ?></label>
                                        </div>
                                                 

                                 

                                        <span class="discount"><?php echo e(\App\websiteSetting::find(1)->personalize); ?> EGP</span>
                                        <div class="form-group">
                                            <label for="fname"><?php echo e(App::getLocale() == 'ar' ? "اسم الطفل ":"Child Name"); ?></label>
                                            <input type="text"  form="addpersonalize" class="form-control" id="child_name[]" name="child_name[]" value="<?php echo e($cart->child_name); ?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="lname"><?php echo e(App::getLocale() == 'ar' ? "عمر الطفل ":"Child Age"); ?></label>
                                            <input type="text" form="addpersonalize" class="form-control age" id="child_age" name="child_age[]" value="<?php echo e($cart->child_age); ?>">
                                        </div>

                                    <div class="form-group">
                                            <label for="lname"><?php echo e(App::getLocale() == 'ar' ? " ملاحظات للبائع  ":" 
Notes to the seller"); ?></label>
                                            <textarea style="
    width: 180px;
    height: 134px;
" type="text" form="addpersonalize" class="form-control age" id="note" name="personalize_note[]" ><?php echo e($cart->personalize_note); ?></textarea>
                                        </div>
                                 
                                    </div>


                                </div>
                            </div>
                            <div class="qun">
                                <a href="/cart/delete/<?php echo e($cart->id); ?>" class="remove"><img src="<?php echo e(asset('img/basket.svg')); ?>" alt=""> <?php echo e(App::getLocale() == 'ar' ? " حذف ":"Remove "); ?></a>
                            </div>
                        </div><hr style="
    margin-top: 0px;
">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <form id="addpersonalize" action="/cart/personalize/"  method='get'>


                        <button type="submit" class="btn btn-block update-cart"><i class="fa fa-sync-alt"></i><?php echo e(App::getLocale() == 'ar' ? " تحديث السله ":"Update Cart"); ?></button>

                        </form>
                        <div class="redirect">
                        <div class="proceed row">
                        <div class="col-md-6">
</div>
                        <div class="col-md-6">
                        <form id="checkout" action="/checkout"  method='get'>
                    
                        <button type="submit" form="checkout" style="
    background-color: #70d0e0;
    color: #fff;
    border-radius: 2rem;
    margin-top: 20px;
"  class="btn btn-block go-proceed"><?php echo e(App::getLocale() == 'ar' ? "انتقل  الي الشحن " :  "proceed to shipping"); ?>    <i class="fa fa-angle-<?php echo e(App::getLocale() == 'ar' ? 'left': 'right'); ?>"></i></button>
</form>   
</div>             </div>
</div>
                        
                    </div>



                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                    <?php $__env->startComponent('components.orderSummary',['subtotal'=>$subtotal,'shipping'=>$shipping,'day'=>$day,'taxes'=>$taxes,'discount'=>$discount,'total'=>$allprice]); ?> <?php echo $__env->renderComponent(); ?>

                    
                    </div>


                    <?php endif; ?>      
                </div>
            </div>
            
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>



<script>

    
function updateCart(val){
    var id= $(val).attr("data-id");
    if ($(val).is(":checked"))
{
    console.log($('#'+id));
$('#'+id).removeClass("unchecked").addClass("checked");

}else{
$('#'+id).removeClass("checked").addClass("unchecked");


}

}


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutWebsite.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>