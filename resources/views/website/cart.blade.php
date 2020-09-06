@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/shopping-cart.css')}}">
@endsection

@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent
<div class="cart-details">
            <div class="container">
            @if($carts->isEmpty())
                            @component('components.emptyWebsite',['sectionِAr'=>'  عربة التسوق ','sectionِEn'=>'cart']) @endcomponent
                            @else 

                <div class="row">
              
                    <div class="col-md-7">

                    <h2><img src="{{asset('img/Cart-c.svg')}}" alt="">{{App::getLocale() == 'ar' ? "  عربة التسوق ": "your shopping cart"}}</h2>

                    
                    
                    @component('components.orderProgress',['statu'=>0]) @endcomponent
                    
   
                        @foreach($carts as $cart)
                        <div class="product-cart-details">
                            <div class="img-section">
                                <img src="{{asset($cart->product->main_image)}}" alt="">
                                <div>
                                    <a href="/product/info/{{$cart->product->id}}">{{App::getLocale() == 'ar' ? $cart->product->name_ar: $cart->product->name_en}}</a>
                                    <div class="price">
                                    @if($cart->discount > 0)
                                    <span class="aft-dis">EGP {{$cart->price - $cart->price*$cart->discount/100 }}</span>
                                    <span class="bef-dis">EGP {{$cart->price}}</span>
                                    <span class="discount">{{$cart->discount}}% off </span>
                                    @else 
                           
                                    <span class="aft-dis">EGP {{$cart->price}}</span>
                                    @endif
                                    </div>
                          
                                    @if($cart->character)
                                    <div class="character">
                                        <h5>{{App::getLocale() == 'ar' ? "الروسومات": "characters"}}: <span>{{App::getLocale() == 'ar' ? $cart->character->name_ar:$cart->character->name_en}}</span></h5>
                                    </div>
                                    @endif

                                    @if($cart->occasion)
                                    <div class="character">
                                        <h5>{{App::getLocale() == 'ar' ? "المناسبة": "occasion"}}: <span>{{App::getLocale() == 'ar' ? $cart->occasion->name_ar:$cart->occasion->name_en}}</span></h5>
                                    </div>
                                    @endif

                                    @if($cart->party_theme)
                                    <div class="character">
                                        <h5>{{App::getLocale() == 'ar' ? "نوع الحفلة ": "party_theme"}}: <span>{{App::getLocale() == 'ar' ? $cart->party_theme->name_ar:$cart->party_theme->name_en}}</span></h5>
                                    </div>
                                    @endif

                                    @if($cart->size)
                                    <div class="size">
                                        <h5>{{App::getLocale() == 'ar' ? "الحجم": "size"}}: <span>{{App::getLocale() == 'ar' ? $cart->size->name_ar:$cart->size->name_en}}</span></h5>
                                    </div>
                                    @endif



                                    <div class="quantity">
                                        <h5> {{App::getLocale() == 'ar' ? "الكمية": "QUANTITY"}} : <span>{{$cart->amount}}</span></h5>
                                    </div>

                            
                                    <a type="button" class="edit" data-toggle="modal" data-target="#myModal-{{$cart->id}}">
                                    <i class="far fa-edit"></i>{{ App::getLocale() == 'ar'  ?  "تعديل " : "Edit" }} </a>
                                    <hr>

                                <!-- update Cart -->
                                <div class="modal fade" id="myModal-{{$cart->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">{{App::getLocale() == 'ar'?  "تحديث السله " : "update cart"}}</h4>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <form id="update-cart-{{ $cart->id }}" action="/cart/update/{{$cart->id}}" method="get" >

                                    @if($cart->character)
                                <div class="character">
                                    <h5 style="display: inline;">{{App::getLocale() == 'ar' ? "الرسومات" : "character"}}</h5>
                                    <div class="center-on-page" style="display: inline-block;margin-left: 100px;">
                                    <select form="update-cart-{{ $cart->id }}" name="character_id" class="custom-select form-control" id="inputGroupSelect03 ">
                                        <option selected value=" ">Mini...</option>
                                        
                                        @foreach($cart->product->character as $character)
                                      
                                        <option value="{{ $character->id }}">{{App::getLocale() == 'ar'? $character->name_ar:$character->name_en}}</option>
                                        @endforeach
                                
                                    </select>
                                </div>
                                </div>
                                

                                @endif

                                @if($cart->occasion)
                                <div class="size">
                                    <h5 style="display: inline;">{{App::getLocale() == 'ar' ? "المناسبة / الحدث" : "Event / Occasion"}}</h5>
                                    <div class="center-on-page" style="display: inline-block;margin-left: 35px;margin-top: 20px;">
                                    <select form="aupdate-cart-{{ $cart->id }}" name="occasion_id"  class="custom-select form-control" id="inputGroupSelect03" >
                                        <option selected value="">Mini...</option>
                                        @foreach($cart->product->occasion as $occasion)
                                      
                                        <option value="{{ $occasion->id }}">{{App::getLocale() == 'ar'? $occasion->name_ar:$occasion->name_en}}</option>
                                        @endforeach
                                
                                    </select>
                                </div>
                                </div>

                                @endif


                                @if($cart->party_theme)
                                <div class="size">
                                    <h5 style="display: inline;">{{App::getLocale() == 'ar' ? "نوع الحفلة " : "party theme"}}</h5>
                                    <div class="center-on-page" style="display: inline-block;margin-left: 100px;">
                                    <select form="update-cart-{{ $cart->id }}" name="party_theme_id" class="custom-select form-control" id="inputGroupSelect03">
                                        <option selected value="">Mini...</option>
                                        @foreach($cart->product->party_theme as $party_theme)
                                        <option value="{{ $party_theme->id }}">{{App::getLocale() == 'ar' ? $party_theme->name_ar:$party_theme->name_en}}</option>
                                        @endforeach
                                
                                    </select>
                                </div>
                                </div>

                                @endif
                                @if($cart->size)
                                <div class="size">
                                    <h5 style="display: inline;">{{App::getLocale() == 'ar' ? " الحجم" : "size "}}</h5>
                                    <div class="center-on-page" style="display: inline-block;margin-left: 148px;margin-top: 20px;">
                                    <select form="update-cart-{{ $cart->id }}" name="size_id"  class="custom-select form-control" id="inputGroupSelect03">
                                        <option selected value="">Mini...</option>
                                        @foreach($cart->product->size as $size)
                                        <option value="{{ $size->id }}">{{App::getLocale() == 'ar' ? $size->name_ar:$size->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>

                                @endif
                                <div class="quantity" style="margin-top: 20px;">
                                    <span class="qun"><label for="quantity">{{App::getLocale() == 'ar' ? "":"QTY"}}</label>
                                    <input type="number" form="update-cart-{{ $cart->id }}"  name="amount" id="quantity" min="0" max="{{$cart->product->amount}}">
                                    </span>
                                    <span class="availability" style="
    background-color: #51bb74;
    color: #fff;
    padding: 0 .7rem;
    border-radius: .3125rem;
    font-size: 18px;
    font-weight: 500;
"> {{App::getLocale() == 'ar' ? "في المخزن":"In stock"}} {{$cart->product->amount}}</span>
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
" class="btn btn-default" data-dismiss="modal">{{App::getLocale() == 'ar' ? "اغلاق":"Close"}}</button>
                                        <button type="submit" style="
    background-color: #70d0e0;
    color: #fff;
    margin: 1rem 0;
    border-radius: 1rem;
    margin-right: 70px;
" form="update-cart-{{ $cart->id }}" class="btn btn-primary"> {{App::getLocale() == 'ar' ? "حفظ":"Save changes"}}</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <!-- end update Cart -->


      
                                    <div class="personalize   {{ $cart->personalize == '1' ? 'checked' :'unchecked' }} " id='personalize-{{$cart->id}}'>
                                        <span>{{App::getLocale() == 'ar' ? "تخصيص الطلب":"Personalize your order"}}</span>

                                        <input type="text" form="addpersonalize" class="form-control age" name="id[]" value="{{$cart->id}}"  hidden>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="check_id-{{$cart->id}}"                                                   value="{{$cart->id}}"
                                                  onchange="updateCart(this)"  
                                                  data-id="personalize-{{$cart->id}}"
                                               form="addpersonalize"
                                                name="personalize[]" {{ $cart->personalize == "1" ? "checked" :"" }} >
                                                    <label class="custom-control-label" for="check_id-{{$cart->id}}">{{App::getLocale() == 'ar' ? "":"ON"}}</label>
                                        </div>
                                                 

                                 

                                        <span class="discount">{{ \App\websiteSetting::find(1)->personalize }} EGP</span>
                                        <div class="form-group">
                                            <label for="fname">{{App::getLocale() == 'ar' ? "اسم الطفل ":"Child Name"}}</label>
                                            <input type="text"  form="addpersonalize" class="form-control" id="child_name[]" name="child_name[]" value="{{$cart->child_name}}">
                                        </div>


                                        <div class="form-group">
                                            <label for="lname">{{App::getLocale() == 'ar' ? "عمر الطفل ":"Child Age"}}</label>
                                            <input type="text" form="addpersonalize" class="form-control age" id="child_age" name="child_age[]" value="{{$cart->child_age}}">
                                        </div>

                                    <div class="form-group">
                                            <label for="lname">{{App::getLocale() == 'ar' ? " ملاحظات للبائع  ":"Child Age"}}</label>
                                            <textarea style="
    width: 180px;
    height: 134px;
" type="text" form="addpersonalize" class="form-control age" id="child_note" name="note" >{{$cart->note}}</textarea>
                                        </div>
                                 
                                    </div>


                                </div>
                            </div>
                            <div class="qun">
                                <a href="/cart/delete/{{$cart->id}}" class="remove"><img src="{{asset('img/basket.svg') }}" alt=""> {{App::getLocale() == 'ar' ? " حذف ":"Remove "}}</a>
                            </div>
                        </div><hr style="
    margin-top: 0px;
">
                        @endforeach
                        <form id="addpersonalize" action="/cart/personalize/"  method='get'>


                        <button type="submit" class="btn btn-block update-cart"><i class="fa fa-sync-alt"></i>{{App::getLocale() == 'ar' ? " تحديث السله ":"Update Cart"}}</button>

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
"  class="btn btn-block go-proceed">{{App::getLocale() == 'ar' ? "انتقل  الي الشحن " :  "proceed to shipping"}}    <i class="fa fa-angle-{{App::getLocale() == 'ar' ? 'left': 'right'}}"></i></button>
</form>   
</div>             </div>
</div>
                        
                    </div>



                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                    @component('components.orderSummary',['subtotal'=>$subtotal,'shipping'=>$shipping,'day'=>$day,'taxes'=>$taxes,'discount'=>$discount,'total'=>$allprice]) @endcomponent

                    
                    </div>


                    @endif      
                </div>
            </div>
            
        </div>
@endsection

@section('javascript')



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

@endsection
