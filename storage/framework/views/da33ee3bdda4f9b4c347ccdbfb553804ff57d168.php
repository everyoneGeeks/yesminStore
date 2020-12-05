
    <?php $__currentLoopData = $Alladdress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="content-bar">
        <div class="head-bar">
        <a  style="
    display: inline-block;
    color: #f86eac;
" role="button" data-toggle="collapse" href="#Address-<?php echo e($address->id); ?>"
             aria-expanded="false" aria-controls="Address-<?php echo e($address->id); ?>" >
        <h5><?php echo e($address->address_name); ?> <i class="fa fa-angle-down"></i>  



        
        </h5>
        </a>   
        <span style="float:right;"><input type="radio"  class="ShippingCity"  data-cityId="<?php echo e($address->city->id); ?>"  form="Address"  name="address" value="<?php echo e($address->id); ?>" <?php echo e($cart->address_id == $address->id  ? "checked" :''); ?> ></span>
        </div>
        <div class="collapse" id="Address-<?php echo e($address->id); ?>">
        <div class="well">
            <form action="/address/update/<?php echo e($address->id); ?>" method="post">
            <?php echo csrf_field(); ?>
                <div class="row">
                <div class="form-group col-md-6">
                        <label for="fname"><?php echo e(App::getLocale() == 'ar' ? "اسم العنوان  ":"address name"); ?></label>
                        <input type="text" class="form-control" id="address_name" name="address_name" value="<?php echo e($address->address_name); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fname"><?php echo e(App::getLocale() == 'ar' ? "الاسم الاول ":"First Name"); ?></label>
                        <input type="text" class="form-control" id="fname" name="first_name" value="<?php echo e($address->first_name); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lname"><?php echo e(App::getLocale() == 'ar' ? "الاسم الاخير  ":"Last Name"); ?></label>
                        <input type="text" class="form-control" id="lname" name="last_name" value="<?php echo e($address->last_name); ?>" >
                    </div>


                    <div class="form-group col-md-6">
                    <label for="country">  <?php echo e(App::getLocale() == 'ar' ? "الدولة ":"Country"); ?> </label>
                    <select style="/* padding-right: 0px; *//* padding-bottom: 0px; */padding-top: 00px;" class="form-control countryAddress" id="country-<?php echo e($address->id); ?>" data-address="<?php echo e($address->id); ?>" name="country" data-countryaddress="<?php echo e($address->id); ?>">
                        
                    <?php $__currentLoopData = $Countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($country->id == $address->country->id): ?>

                    <option value="<?php echo e($address->country->id); ?>" selected > <?php echo e(App::getLocale() == 'ar' ? $address->country->name_ar :$address->country->name_en); ?> </option>
                    <?php else: ?> 
                    <option value="<?php echo e($country->id); ?>"  > <?php echo e(App::getLocale() == 'ar' ? $country->name_ar :$country->name_en); ?> </option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </select>
                  </div>


                  <div class="form-group col-md-6">
                    <label for="city"> <?php echo e(App::getLocale() == 'ar' ? "المدينة ":"City"); ?> </label>
                    <select  style="/* padding-right: 0px; *//* padding-bottom: 0px; */padding-top: 00px;" class="form-control cityAddress" id="city-<?php echo e($address->id); ?>" name="city" >
                   
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <?php if($city->id ==$address->city->id ): ?>
                    <option  data-country="<?php echo e($address->country->id); ?>" value="<?php echo e($address->city->id); ?>" selected  > <?php echo e(App::getLocale() == 'ar' ? $address->city->name_ar :$address->city->name_en); ?> </option>
                    <?php else: ?>  

                    <option  data-country="<?php echo e($city->country->isEmpty()  ? 0: $city->country[0]->id); ?>" style="<?php echo e(!$city->country->isEmpty() && $city->country[0]->id == $address->country->id   ?  : 'display: none;'); ?>"  value="<?php echo e($city->id); ?>"   > <?php echo e(App::getLocale() == 'ar' ? $city->name_ar :$city->name_en); ?> </option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </select>
                  </div>

                    <div class="form-group col-md-6">
                        <label for="street"><?php echo e(App::getLocale() == 'ar' ? "اسم الشارع":"Street Name/No"); ?></label>
                        <input type="text" class="form-control" id="street" name="street_name" value="<?php echo e($address->street_name); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="building"><?php echo e(App::getLocale() == 'ar' ? "اسم المبني":"Building Name/No"); ?></label>
                        <input type="text" class="form-control" id="building" name="building_name" value="<?php echo e($address->building_name); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="floor"><?php echo e(App::getLocale() == 'ar' ? "رقم الدور ":"Floor No"); ?></label>
                        <input type="number" class="form-control" id="floor" name="floor" value="<?php echo e($address->floor); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apartment"><?php echo e(App::getLocale() == 'ar' ? "رقم الشقة  ":"Apartment No"); ?></label>
                        <input type="number" class="form-control" id="apartment" name="apartment" value="<?php echo e($address->apartment); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="landmark"><?php echo e(App::getLocale() == 'ar' ? " أقرب معلم":"Nearest Landmark"); ?></label>
                        <input type="text" class="form-control" id="landmark" name="nearest" value="<?php echo e($address->nearest); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="location"><?php echo e(App::getLocale() == 'ar' ? " اسم الموقع ":"Location Name "); ?></label>
                        <input type="text" class="form-control" id="location" name="location" value="<?php echo e($address->location); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone"><?php echo e(App::getLocale() == 'ar' ? "رقم الهاتف":"Phone Number"); ?></label>
                        <input type="tel" class="form-control" id="phone" name="phone_number" value="<?php echo e($address->phone_number); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="add-phone"><?php echo e(App::getLocale() == 'ar' ? "رقم الهاتف اضافي (اختياري) ":"Additional Phone Number (Optional)"); ?></label>
                        <input type="tel" class="form-control" id="add-phone" name="additional_phone_number" value="<?php echo e($address->additional_phone_number); ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="landline"><?php echo e(App::getLocale() == 'ar' ? " رقم ارضي ":"LandLine"); ?></label>
                        <input type="text" class="form-control" id="landline" name="landLine" value="<?php echo e($address->landLine); ?>">
                    </div>
                    <div class="form-group col-12">
                        <label for="note"><?php echo e(App::getLocale() == 'ar' ? "ملاحظة الشحن":"Shipping Note"); ?></label>
                        <textarea class="form-control" id="note" rows="8" name="shipping_note" ><?php echo e($address->shipping_note); ?></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn save"><?php echo e(App::getLocale() == 'ar' ? "حفظ":"Save"); ?></button>
                        <button  type="reset" value="Reset" class="btn cancel"><?php echo e(App::getLocale() == 'ar' ? "إلغاء":"Cancel"); ?></button>
                    </div>
                </div>
            </form>
       
        </div>
        </div>

    </div>
    <hr>




    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





