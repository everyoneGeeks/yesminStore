
<?php 
$emptyCart == null ?  $emptyCart =null: $emptyCart  ;
?>

<?php if(App::getLocale() == 'ar'): ?>
<h1 style="
    text-align: center;
    width: 50%;
    border:  solid;
    border-color: pink;
    color: pink;
"> لايوجد <?php echo e($sectionِAr); ?></h1>

<?php elseif($emptyCart): ?>
<h1 style="
    text-align: center;
    width: 50%;
    border:  solid;
    border-color: pink;
    color: pink;
"> Your cart is empty </h1>

<?php else: ?> 

<h1 style="
    text-align: center;
    width: 50%;
    border:  solid;
    border-color: pink;
    color: pink;
"> Not Found <?php echo e($sectionِEn); ?> </h1>

<?php endif; ?>