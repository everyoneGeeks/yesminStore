
<div class="addresses">
    <h4>{{App::getLocale() == 'ar' ? "العناوين" :"Addresses"}} <span>{{App::getLocale() == 'ar' ? "الافعال":"Actions"}}</span></h4>
    @foreach($user->address as $address)
    <div class="content-bar">
        <div class="head-bar">
        <a  role="button" data-toggle="collapse" href="#Address-{{$address->id}}"
             aria-expanded="false" aria-controls="Address-{{$address->id}}">
        <h5>{{$address->address_name}} <i class="fa fa-angle-down"></i>
  
<!-- Button trigger modal -->
<a  data-toggle="modal" data-target="#myModal-{{$address->id}}">
<img src="{{asset('img/basket.svg')}}" alt="">
</a>

<!-- Modal -->
<div class="modal fade" id="myModal-{{$address->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{App::getLocale() == 'ar' ? "حذف العنوان ": "delete address"}}</h4>
      </div>
      <div class="modal-body">
       {{ App::getLocale() == 'ar'  ? "هل تريد حذف العنوان " : "do you want to delete address" }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{App::getLocale() == 'ar' ?  "الغاء":"Close"}}</button>
        <a type="button" class="btn btn-danger" href="/address/delete/{{$address->id}}">{{App::getLocale() == 'ar' ?  "حذف":"delete"}}</a>
      </div>
    </div>
  </div>
</div>
        
        </h5>
        </a>
        </div>
        <div class="collapse" id="Address-{{$address->id}}">
        <div class="well">
            <form action="/address/update/{{$address->id}}" method="post" id="addAddress-{{$address->id}}">
            @csrf
                <div class="row">
                <div class="form-group col-md-6">
                        <label for="fname">{{App::getLocale() == 'ar' ? "اسم العنوان  ":"address name"}}</label>
                        <input type="text" class="form-control" form="addAddress-{{$address->id}}" id="address_name" name="address_name" value="{{$address->address_name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fname">{{App::getLocale() == 'ar' ? "الاسم الاول ":"First Name"}}</label>
                        <input type="text" class="form-control" form="addAddress-{{$address->id}}" id="fname" name="first_name" value="{{$address->first_name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lname">{{App::getLocale() == 'ar' ? "الاسم الاخير  ":"Last Name"}}</label>
                        <input type="text" class="form-control" form="addAddress-{{$address->id}}" id="lname" name="last_name" value="{{$address->last_name}}" >
                    </div>


                    <div class="form-group col-md-6">
                    <label for="country">  {{App::getLocale() == 'ar' ? "الدولة ":"Country"}} </label>
                    <select class="form-control country " form="addAddress-{{$address->id}}" data-address="{{$address->id}}" id="country" name="country">
                    
                    @foreach($Countries as $country)
                    @if($country->id == $address->country->id)

                    <option value="{{ $address->country->id }}" selected > {{App::getLocale() == 'ar' ? $address->country->name_ar :$address->country->name_en}} </option>
                    @else 
                    <option value="{{ $country->id }}"  > {{App::getLocale() == 'ar' ? $country->name_ar :$country->name_en}} </option>
                    @endif
                    @endforeach

                  </select>
                  </div>
                 

                  <div class="form-group col-md-6">
                    <label for="city"> {{App::getLocale() == 'ar' ? "المدينة ":"City"}} </label>
                    <select class="form-control" form="addAddress-{{$address->id}}" id="city-{{$address->id}}"  name="city">
                   
                    @foreach($cities as $city) 
                

               

                    <option  data-country="{{$city->cities == null  ? 0: $city->country_id  }}" style="{{ $city->country_id == $address->country->id   ?  ' ': 'display: none;' }}"     value="{{ $city->city_id }}"  {{ $city->city_id == $address->city_id   ?  'selected ': '' }}  > {{App::getLocale() == 'ar' ? $city->cities->name_ar :$city->cities->name_en}} </option>
                
                    @endforeach

                  </select>
                  </div>

                    <div class="form-group col-md-6">
                        <label for="street">{{App::getLocale() == 'ar' ? "اسم الشارع":"Street Name/No"}}</label>
                        <input type="text" form="addAddress-{{$address->id}}" class="form-control" id="street" name="street_name" value="{{$address->street_name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="building">{{App::getLocale() == 'ar' ? "اسم المبني":"Building Name/No"}}</label>
                        <input type="text" form="addAddress-{{$address->id}}" class="form-control" id="building" name="building_name" value="{{$address->building_name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="floor">{{App::getLocale() == 'ar' ? "رقم الدور ":"Floor No"}}</label>
                        <input type="number" form="addAddress-{{$address->id}}" class="form-control" id="floor" name="floor" value="{{$address->floor}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apartment">{{App::getLocale() == 'ar' ? "رقم الشقة  ":"Apartment No"}}</label>
                        <input type="number" form="addAddress-{{$address->id}}" class="form-control" id="apartment" name="apartment" value="{{$address->apartment}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="landmark">{{App::getLocale() == 'ar' ? " أقرب معلم":"Nearest Landmark"}}</label>
                        <input type="text" form="addAddress-{{$address->id}}" class="form-control" id="landmark" name="nearest" value="{{$address->nearest}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="location">{{App::getLocale() == 'ar' ? " اسم الموقع ":"Location Name "}}</label>
                        <input type="text" form="addAddress-{{$address->id}}" class="form-control" id="location" name="location" value="{{$address->location}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">{{App::getLocale() == 'ar' ? "رقم الهاتف":"Phone Number"}}</label>
                        <input type="tel" form="addAddress-{{$address->id}}" class="form-control" id="phone" name="phone_number" value="{{$address->phone_number}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="add-phone">{{App::getLocale() == 'ar' ? "رقم الهاتف اضافي (اختياري) ":"Additional Phone Number (Optional)"}}</label>
                        <input type="tel" form="addAddress-{{$address->id}}" class="form-control" id="add-phone" name="additional_phone_number" value="{{$address->additional_phone_number}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="landline">{{App::getLocale() == 'ar' ? " رقم ارضي ":"LandLine"}}</label>
                        <input type="text" form="addAddress-{{$address->id}}" class="form-control" id="landline" name="landLine" value="{{$address->landLine}}">
                    </div>
                    <div class="form-group col-12">
                        <label for="note">{{App::getLocale() == 'ar' ? "ملاحظة الشحن":"Shipping Note"}}</label>
                        <textarea form="addAddress-{{$address->id}}" class="form-control" id="note" rows="8" name="shipping_note" value="{{$address->shipping_note}}"></textarea>
                    </div>
                    <div class="col-12">
                        <button form="addAddress-{{$address->id}}" type="submit" class="btn save">{{App::getLocale() == 'ar' ? "حفظ":"Save"}}</button>
                        <button form="addAddress-{{$address->id}}" type="reset" class="btn cancel">{{App::getLocale() == 'ar' ? "إلغاء":"Cancel"}}</button>
                    </div>
                </div>
            </form>
       
        </div>
        </div>

    </div>
    @endforeach
</div>
