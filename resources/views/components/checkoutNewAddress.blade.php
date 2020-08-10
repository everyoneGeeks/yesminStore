
    <div class="content-bar">
        <div class="head-bar">
        <a  style="
    display: inline-block;
" role="button" data-toggle="collapse" href="#newAddress"
             aria-expanded="false" aria-controls="newAddress">
        <h5>{{ App::getLocale() == 'ar' ? "اضافة عنوان": "Add Address" }} <i class="fa fa-angle-down"></i>  

        </h5>
        </a>
        
        </div>
        <div class="collapse" id="newAddress">
        <div class="well">
                <div class="row">
                <div class="form-group col-md-6">
                        <label for="fname">{{App::getLocale() == 'ar' ? "اسم العنوان  ":"address name"}}</label>
                        <input  form="Address" type="text" class="form-control" id="address_name" name="address_name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fname">{{App::getLocale() == 'ar' ? "الاسم الاول ":"First Name"}}</label>
                        <input  form="Address" type="text" class="form-control" id="fname" name="first_name" value=>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lname">{{App::getLocale() == 'ar' ? "الاسم الاخير  ":"Last Name"}}</label>
                        <input form="Address"  type="text" class="form-control" id="lname" name="last_name"  >
                    </div>


                    <div class="form-group col-md-6">
                    <label for="country">  {{App::getLocale() == 'ar' ? "الدولة ":"Country"}} </label>
                    <select  form="Address" class="form-control" id="country" name="country">
                        
                    @foreach($Countries as $country)

                    <option value="{{ $country->id }}"  > {{App::getLocale() == 'ar' ? $country->name_ar :$country->name_en}} </option>
             
                    @endforeach

                  </select>
                  </div>


                  <div class="form-group col-md-6">
                    <label for="city"> {{App::getLocale() == 'ar' ? "المدينة ":"City"}} </label>
                    <select  form="Address" class="form-control" id="city" name="city">
                   
                    @foreach($cities as $city) 


                    <option value="{{ $city->id  }}"   > {{App::getLocale() == 'ar' ? $city->name_ar :$city->name_en}} </option>
                 
                    @endforeach

                  </select>
                  </div>

                    <div class="form-group col-md-6">
                        <label for="street">{{App::getLocale() == 'ar' ? "اسم الشارع":"Street Name/No"}}</label>
                        <input form="Address" form="Address" type="text" class="form-control" id="street" name="street_name" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="building">{{App::getLocale() == 'ar' ? "اسم المبني":"Building Name/No"}}</label>
                        <input form="Address" type="text" class="form-control" id="building" name="building_name" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="floor">{{App::getLocale() == 'ar' ? "رقم الدور ":"Floor No"}}</label>
                        <input form="Address" type="number" class="form-control" id="floor" name="floor" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apartment">{{App::getLocale() == 'ar' ? "رقم الشقة  ":"Apartment No"}}</label>
                        <input form="Address" type="number" class="form-control" id="apartment" name="apartment" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="landmark">{{App::getLocale() == 'ar' ? " أقرب معلم":"Nearest Landmark"}}</label>
                        <input form="Address" type="text" class="form-control" id="landmark" name="nearest">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="location">{{App::getLocale() == 'ar' ? " اسم الموقع ":"Location Name "}}</label>
                        <input form="Address" type="text" class="form-control" id="location" name="location" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">{{App::getLocale() == 'ar' ? "رقم الهاتف":"Phone Number"}}</label>
                        <input form="Address" type="tel" class="form-control" id="phone" name="phone_number" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="add-phone">{{App::getLocale() == 'ar' ? "رقم الهاتف اضافي (اختياري) ":"Additional Phone Number (Optional)"}}</label>
                        <input form="Address" type="tel" class="form-control" id="add-phone" name="additional_phone_number" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="landline">{{App::getLocale() == 'ar' ? " رقم ارضي ":"LandLine"}}</label>
                        <input form="Address" type="text" class="form-control" id="landline" name="landLine" >
                    </div>
                    <div class="form-group col-12">
                        <label for="note">{{App::getLocale() == 'ar' ? "ملاحظة الشحن":"Shipping Note"}}</label>
                        <textarea form="Address" class="form-control" id="note" rows="8" name="shipping_note" ></textarea>
                    </div>
                    <div class="col-12">
                        <button  type="reset" class="btn cancel">{{App::getLocale() == 'ar' ? "إلغاء":"Cancel"}}</button>
                    </div>
                </div>
        
       
        </div>
        </div>

    </div>
    <hr>





