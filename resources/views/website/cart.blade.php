@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/shopping-cart.css')}}">
@endsection

@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent
<div class="cart-details">
            <div class="container">
                <div class="row">
              
                    <div class="col-md-7">

                    <h2><img src="{{asset('img/Cart-c.svg')}}" alt="">{{App::getLocale() == 'ar' ? "سلة التسوق": "your shopping cart"}}</h2>

                    
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
                                    <span class="discount">{{$cart->discount}}% </span>
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
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">{{App::getLocale() == 'ar'?  "تحديث السله " : "update cart"}}</h4>
                                    </div>
                                    <div class="modal-body">
                                    
                                    <form id="update-cart-{{ $cart->id }}" action="/cart/update/{{$cart->id}}" method="get" >

                                    @if($cart->character)
                                <div class="character">
                                    <h5 style="display: inline;">{{App::getLocale() == 'ar' ? "الرسومات" : "character"}}</h5>
                                    <select form="update-cart-{{ $cart->id }}" name="character_id" class="custom-select form-control" id="inputGroupSelect03 ">
                                        <option selected value="">Mini...</option>
                                        @foreach($cart->product->character as $character)
                                      
                                        <option value="{{ $character->id }}">{{App::getLocale() == 'ar'? $character->name_ar:$character->name_en}}</option>
                                        @endforeach
                                
                                    </select>
                                </div>
                                @endif

                                @if($cart->occasion)
                                <div class="character">
                                    <h5 style="display: inline;">{{App::getLocale() == 'ar' ? "المناسبة / الحدث" : "Event / Occasion"}}</h5>
                                    <select form="aupdate-cart-{{ $cart->id }}" name="occasion_id"  class="custom-select form-control" id="inputGroupSelect03" >
                                        <option selected value="">Mini...</option>
                                        @foreach($cart->product->occasion as $occasion)
                                      
                                        <option value="{{ $occasion->id }}">{{App::getLocale() == 'ar'? $occasion->name_ar:$occasion->name_en}}</option>
                                        @endforeach
                                
                                    </select>
                                </div>
                                @endif


                                @if($cart->party_theme)
                                <div class="character">
                                    <h5 style="display: inline;">{{App::getLocale() == 'ar' ? "نوع الحفلة " : "party theme"}}</h5>
                                    <select form="update-cart-{{ $cart->id }}" name="party_theme_id" class="custom-select form-control" id="inputGroupSelect03">
                                        <option selected value="">Mini...</option>
                                        @foreach($cart->product->party_theme as $party_theme)
                                        <option value="{{ $party_theme->id }}">{{App::getLocale() == 'ar' ? $party_theme->name_ar:$party_theme->name_en}}</option>
                                        @endforeach
                                
                                    </select>
                                </div>
                                @endif
                                @if($cart->size)
                                <div class="size">
                                    <h5 style="display: inline;">{{App::getLocale() == 'ar' ? " الحجم" : "size "}}</h5>
                                    <select form="update-cart-{{ $cart->id }}" name="size_id"  class="custom-select form-control" id="inputGroupSelect03">
                                        <option selected value="">Mini...</option>
                                        @foreach($cart->product->size as $size)
                                        <option value="{{ $size->id }}">{{App::getLocale() == 'ar' ? $size->name_ar:$size->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                <div class="quantity">
                                    <span class="qun"><label for="quantity">{{App::getLocale() == 'ar' ? "":"QTY"}}</label>
                                    <input type="number" form="update-cart-{{ $cart->id }}"  name="amount" id="quantity" min="0" max="{{$cart->product->amount}}">
                                    </span>
                                    <span class="availability"> {{App::getLocale() == 'ar' ? "في المخزن":"In stock"}} {{$cart->product->amount}}</span>
                                </div>                                

                             
                                    </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">{{App::getLocale() == 'ar' ? "اغلاق":"Close"}}</button>
                                        <button type="submit" form="update-cart-{{ $cart->id }}" class="btn btn-primary"> {{App::getLocale() == 'ar' ? "حفظ":"Save changes"}}</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <!-- end update Cart -->

      
                                    <div class="personalize   {{ $cart->personalize == '1' ? 'checked' :'unchecked' }} " id='personalize-{{$cart->id}}'>
                                        <span>{{App::getLocale() == 'ar' ? "إضفاء الطابع الشخصي على طلبك":"Personalize your order"}}</span>
                                        <input type="text" form="addpersonalize" class="form-control age" name="id[]" value="{{$cart->id}}"  hidden>
                                        <div class="form-check">
                                            <input  type="checkbox"
                                              data-id="personalize-{{$cart->id}}"
                                               form="addpersonalize"
                                                name="personalize[]"
                                                 class="form-check-input" 
                                                  id='check_id'
                                                  value="{{$cart->id}}"
                                                  onchange="updateCart(this)"
                                                    {{ $cart->personalize == "1" ? "checked" :"" }}>
                                            <label class="form-check-label" for="exampleCheck1">{{App::getLocale() == 'ar' ? "":"ON"}}</label>
                                        </div>

                                        <span class="discount">50 EGP</span>
                                        <div class="form-group">
                                            <label for="fname">{{App::getLocale() == 'ar' ? "اسم الطفل ":"Child Name"}}</label>
                                            <input type="text"  form="addpersonalize" class="form-control" id="child_name[]" name="child_name[]" value="{{$cart->child_name}}">
                                        </div>


                                        <div class="form-group">
                                            <label for="lname">{{App::getLocale() == 'ar' ? "عمر الطفل ":"Child Age"}}</label>
                                            <input type="text" form="addpersonalize" class="form-control age" id="child_age" name="child_age[]" value="{{$cart->child_age}}">
                                        </div>



                                 
                                    </div>


                                </div>
                            </div>
                            <div class="qun">
                                <a href="/cart/delete/{{$cart->id}}" class="remove"><img src="{{asset('img/basket.svg') }}" alt=""> {{App::getLocale() == 'ar' ? " حذف ":"Remove "}}</a>
                            </div>
                        </div><hr>
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
                    
                        <button type="submit" form="checkout"  class="btn btn-block go-proceed">{{App::getLocale() == 'ar' ? "انتقل  الي الشحن " :  "proceed to shipping"}}    <i class="fa fa-angle-{{App::getLocale() == 'ar' ? 'left': 'right'}}"></i></button>
</form>   
</div>             </div>
</div>
                        
                    </div>



                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                    @component('components.orderSummary',['subtotal'=>200,'shipping'=>50,'taxes'=>20,'discount'=>30,'total'=>40]) @endcomponent

                    
                    </div>
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
