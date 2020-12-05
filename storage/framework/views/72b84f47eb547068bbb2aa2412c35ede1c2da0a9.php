<span>
<?php if($rate !== 0): ?>
<?php for($i= 1; $i <= $rate ; $i++): ?>

    <i class="fas fa-star"></i>
<?php endfor; ?>
<?php endif; ?>

<?php if($rate < 5 && $rate !== 0 ): ?>
<?php for($i= 1; $i <= $rate-5 ; $i++): ?>

    <i class="far fa-star"></i>
<?php endfor; ?>
<?php endif; ?>

<?php if($rate == 0): ?>
<?php for($i= 1; $i <= 5 ; $i++): ?>

    <i style="color:#adb5bd;" class="far fa-star"></i>
<?php endfor; ?>
<?php endif; ?>

</span>