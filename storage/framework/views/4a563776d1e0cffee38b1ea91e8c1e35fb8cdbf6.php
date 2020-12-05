<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/checkout.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.Websiteerror',['errors'=>$errors ?? NULL]); ?> <?php echo $__env->renderComponent(); ?>
<div class="cart-details">
            <div class="container">
                <div class="row">
              
                    <div class="col-md-7">


                    <h2><img src="<?php echo e(asset('img/Cart-c.svg')); ?>" alt=""><?php echo e(App::getLocale() == 'ar' ? "سلة التسوق": "your shopping cart"); ?></h2>

                    
                    <?php $__env->startComponent('components.orderProgress',['statu'=>1]); ?> <?php echo $__env->renderComponent(); ?>
                    

                    <div class="checkout-details">
<?php if($Alladdress): ?>
<?php $__env->startComponent('components.checkoutUserAddress',['cart'=>$cart,'Alladdress'=>$Alladdress,'Countries'=>$Countries,'cities'=>$cities]); ?> <?php echo $__env->renderComponent(); ?>
<?php $__env->startComponent('components.checkoutNewAddress',['Countries'=>$Countries,'cities'=>$cities]); ?> <?php echo $__env->renderComponent(); ?>
<?php else: ?> 
<?php $__env->startComponent('components.checkoutNewAddress',['Countries'=>$Countries,'cities'=>$cities]); ?> <?php echo $__env->renderComponent(); ?>

<?php endif; ?> 
<div class="proceed row">
    <form action="/address/cart" method="get" id="Address">

</form>
                                <div class="col-md-6">
                                    <a href="/cart" class="btn btn-block back" style="
    background-color: #70d0e0;
    color: #fff;
    border-radius: 2rem;
    margin-top: 20px;
" ><i class="fa fa-angle-<?php echo e(App::getLocale() == 'ar' ? 'right': 'left'); ?>" ></i>  <?php echo e(App::getLocale() == 'ar' ? " العودة الي سلة التسوق  ": "back to cart"); ?> </a>
                                </div>
                                <div class="col-md-6">
                                    <button href="#" type="submit" style="
    background-color: #70d0e0;
    color: #fff;
    border-radius: 2rem;
    margin-top: 20px;
"  form="Address" type="submit" class="btn btn-block go-proceed"> <?php echo e(App::getLocale() == 'ar' ? "  الذهاب الي الدفع  ": "proceed to payment "); ?> <i class="fa fa-angle-<?php echo e(App::getLocale() == 'ar' ? 'left': 'right'); ?>"></i></button>
                                </div>
                            </div>
</div>  </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                    <?php $__env->startComponent('components.orderSummary',['subtotal'=>$subtotal,'shipping'=>$shipping,'day'=>$day,'taxes'=>$taxes,'discount'=>$discount,'total'=>$allprice]); ?> <?php echo $__env->renderComponent(); ?>

                    </div>
                  
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>



<script>

$( document ).ready(function() {
$('.countryAddress').change(function(){
    var countryID = $(this).val();    
    var cityAddress=$(this).attr('data-address');
    if(countryID){
        $.ajax({
           type:"GET",
           url:'/shipping/cities/'+countryID,
           success:function(res){               
            if(res){
             $('#city-'+cityAddress).empty();
             $('#city-'+cityAddress).append('<option>Select</option>');
                $.each(res,function(key,value){
        
                    if(key=='data'){
                    value.forEach(function(city,index, value){

                    console.log(city);
                    <?php if(App::getLocale() == 'ar'): ?>
                    $('#city-'+cityAddress).append('<option value="'+city.cities.id+'">'+city.cities.name_ar+'</option>');
                

                    <?php else: ?> 
                    $('#city-'+cityAddress).append('<option value="'+city.cities.id+'">'+city.cities.name_en+'</option>');


                    <?php endif; ?>
                });
                }
                });
           
            }else{
                $('#city-'+cityAddress).empty();
            }
           }
        });
    }else{
        $('#city-'+cityAddress).empty();

    }      
   });







$('.cityAddress').change(function(){
    var cityId = $(this).val();    
    if(cityId){
        $.ajax({
           type:"GET",
           url:'/shipping/cost/'+cityId,
           success:function(res){               
            if(res){
                $.each(res,function(key,value){
        
                    if(key=='data'){
                    

                        $('#Shipping').empty();
                         $('#Shipping').text('EGP'+" "+value.cost);
              
                }
                });
           
            }else{
                $('#Shipping').text('EGP 0');
            }
           }
        });
    }else{
        $('#Shipping').text('EGP 0');

    }      
   });




   $('.ShippingCity').change(function(){
    var cityId = $(this).attr('data-cityId');    
    if(cityId){
        $.ajax({
           type:"GET",
           url:'/shipping/cost/'+cityId,
           success:function(res){               
            if(res){
                $.each(res,function(key,value){
        
                    if(key=='data'){
                    

                        $('#Shipping').empty();
                         $('#Shipping').text('EGP'+" "+value.cost);
                         var total=$('#TotalPrice').attr('data-total');
                         console.log(total);
                          var updateCost=parseInt(total)+ value.cost;
                          $('#TotalPrice').text('EGP'+" "+updateCost)  
              
                }
                });
           
            }else{
                $('#Shipping').text('EGP 0');
            }
           }
        });
    }else{
        $('#Shipping').text('EGP 0');

    }      
   });

});

function updateCart(val){
    var id= $(val).attr("data-id");
    if ($('#check_id').is(":checked"))
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