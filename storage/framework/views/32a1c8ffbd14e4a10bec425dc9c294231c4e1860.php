
    <div class="content-bar">
        <div class="head-bar">
        <a  style="
    display: inline-block;
    color: #f86eac;
"role="button" data-toggle="collapse" href="#newAddress"
             aria-expanded="false" aria-controls="newAddress" >
        <h5><?php echo e(App::getLocale() == 'ar' ? "اضافة عنوان": "Add Address"); ?> <i class="fa fa-angle-down"></i>  

        </h5>
        </a>
        
        </div>
        <div class="collapse" id="newAddress">
        <div class="well">
                <div class="row">
                <div class="form-group col-md-6">
                        <label for="fname"><?php echo e(App::getLocale() == 'ar' ? "اسم العنوان  ":"address name"); ?></label>
                        <input  form="Address" type="text" class="form-control" id="address_name" name="address_name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fname"><?php echo e(App::getLocale() == 'ar' ? "الاسم الاول ":"First Name"); ?></label>
                        <input  form="Address" type="text" class="form-control" id="fname" name="first_name" value=>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lname"><?php echo e(App::getLocale() == 'ar' ? "الاسم الاخير  ":"Last Name"); ?></label>
                        <input form="Address"  type="text" class="form-control" id="lname" name="last_name"  >
                    </div>





                    <div class="form-group col-md-6">
                    <label for="country">  <?php echo e(App::getLocale() == 'ar' ? "الدولة ":"Country"); ?> </label>
                    <select  style="/* padding-right: 0px; *//* padding-bottom: 0px; */padding-top: 00px;" form="Address" class="form-control countryAddress" data-address="0" id="country" name="country">
                        
                    <?php $__currentLoopData = $Countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($country->id); ?>"  > <?php echo e(App::getLocale() == 'ar' ? $country->name_ar :$country->name_en); ?> </option>
             
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </select>
                  </div>






                  <div class="form-group col-md-6">
                    <label for="city"> <?php echo e(App::getLocale() == 'ar' ? "المدينة ":"City"); ?> </label>
                    <select  style="/* padding-right: 0px; *//* padding-bottom: 0px; */padding-top: 00px;" form="Address" class="form-control cityAddress" id="city-0" name="city">
                   
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

                    <option  data-country="<?php echo e($city->country->isEmpty()  ? 0: $city->country[0]->id); ?>" style="<?php echo e($city->country->isEmpty()    ?  'display: none;' : ''); ?>"  value="<?php echo e($city->id); ?>"   > <?php echo e(App::getLocale() == 'ar' ? $city->name_ar :$city->name_en); ?> </option>

                 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </select>
                  </div>

                    <div class="form-group col-md-6">
                        <label for="street"><?php echo e(App::getLocale() == 'ar' ? "اسم الشارع":"Street Name/No"); ?></label>
                        <input form="Address" form="Address" type="text" class="form-control" id="street" name="street_name" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="building"><?php echo e(App::getLocale() == 'ar' ? "اسم المبني":"Building Name/No"); ?></label>
                        <input form="Address" type="text" class="form-control" id="building" name="building_name" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="floor"><?php echo e(App::getLocale() == 'ar' ? "رقم الدور ":"Floor No"); ?></label>
                        <input form="Address" type="number" class="form-control" id="floor" name="floor" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apartment"><?php echo e(App::getLocale() == 'ar' ? "رقم الشقة  ":"Apartment No"); ?></label>
                        <input form="Address" type="number" class="form-control" id="apartment" name="apartment" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="landmark"><?php echo e(App::getLocale() == 'ar' ? " أقرب معلم":"Nearest Landmark"); ?></label>
                        <input form="Address" type="text" class="form-control" id="landmark" name="nearest">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="location"><?php echo e(App::getLocale() == 'ar' ? " اسم الموقع ":"Location Name "); ?></label>
                        <input form="Address" type="text" class="form-control" id="location" name="location" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone"><?php echo e(App::getLocale() == 'ar' ? "رقم الهاتف":"Phone Number"); ?></label>
                        <input form="Address" type="tel" class="form-control" id="phone" name="phone_number" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="add-phone"><?php echo e(App::getLocale() == 'ar' ? "رقم الهاتف اضافي (اختياري) ":"Additional Phone Number (Optional)"); ?></label>
                        <input form="Address" type="tel" class="form-control" id="add-phone" name="additional_phone_number" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="landline"><?php echo e(App::getLocale() == 'ar' ? " رقم ارضي ":"LandLine"); ?></label>
                        <input form="Address" type="text" class="form-control" id="landline" name="landLine" >
                    </div>
                    <div class="form-group col-12">
                        <label for="note"><?php echo e(App::getLocale() == 'ar' ? "ملاحظة الشحن":"Shipping Note"); ?></label>
                        <textarea form="Address" class="form-control" id="note" rows="8" name="shipping_note" ></textarea>
                    </div>
                    <div class="col-12">
                       <button  form="Address"  type="submit"  class="btn cancel"><?php echo e(App::getLocale() == 'ar' ? "اضافة ":"save"); ?></button>

                        <button  form="Address"  type="reset" value="Reset" class="btn cancel"><?php echo e(App::getLocale() == 'ar' ? "إلغاء":"Cancel"); ?></button>
                    </div>
                </div>
        
       
        </div>
        </div>

    </div>
    <hr>





