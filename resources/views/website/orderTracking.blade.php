@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/order-tracking.css')}}">
@endsection

@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent
<div class="order-tracking cart-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2><img src="{{asset('img/Shipping.svg')}}" alt="">{{App::getLocale() == 'ar' ?  "":"Track Your Order"}}</h2>
                        @component('components.orderProgress',['statu'=>3]) @endcomponent
                        <div class="right-msg">
                            <img src="{{asset('img/Right (sign).svg')}}" alt="">
                            <h3>
                            {{App::getLocale() == 'ar' ? "تم إكمال طلبك بنجاح يمكنك تتبع طلبك الآن"
                            :"Your order has been successfully completed You can track your order now"}}
      
                            </h3>
                        </div>
                        <div class="orders">

                        @component('components.orderTrackingProgress',['statu'=>0]) @endcomponent

@foreach($orderPrduct as $product)


                            <div class="product-cart-details">
                                <div class="img-section">
                                    <img src="{{$product->product->main_image}}" alt="">
                                    <div>
                                        <a href="/product/info/{{$product->product->id}}">{{App::getLocale() == 'ar' ?  $product->product->name_ar: $product->product->name_en}}</a>
                                        <div class="price">
                                    @if($product->discount !== 0 )
                                    <span class="aft-dis">EGP {{$product->product->price - $product->product->price*$product->product->discount/100 }}</span>
                                    <span class="bef-dis">EGP {{$product->product->price}}</span>
                                    <span class="discount">{{$product->product->discount}}% </span>
                                    @else 
                                    <span class="aft-dis">EGP {{$product->product->price}}</span>
                                    @endif
                                </div><hr>


                                @if($product->character)
                                    <div class="character">
                                        <h5>{{App::getLocale() == 'ar' ? "الروسومات": "characters"}}: <span>{{App::getLocale() == 'ar' ? $product->character->name_ar:$product->character->name_en}}</span></h5>
                                    </div>
                                    @endif

                                    @if($product->occasion)
                                    <div class="character">
                                        <h5>{{App::getLocale() == 'ar' ? "المناسبة": "occasion"}}: <span>{{App::getLocale() == 'ar' ? $product->occasion->name_ar:$product->occasion->name_en}}</span></h5>
                                    </div>
                                    @endif

                                    @if($product->party_theme)
                                    <div class="character">
                                        <h5>{{App::getLocale() == 'ar' ? "نوع الحفلة ": "party_theme"}}: <span>{{App::getLocale() == 'ar' ? $product->party_theme->name_ar:$product->party_theme->name_en}}</span></h5>
                                    </div>
                                    @endif
                                    @if($product->size)
                                    <div class="size">
                                        <h5>{{App::getLocale() == 'ar' ? "الحجم": "size"}}: <span>{{App::getLocale() == 'ar' ? $product->size->name_ar:$product->size->name_en}}</span></h5>
                                    </div>
                                    @endif

                                    <div class="quantity">
                                        <h5> {{App::getLocale() == 'ar' ? "الكمية": "QUANTITY"}} : <span>{{$product->amount}}</span></h5>
                                    </div>
                                        
                                    
                                    </div>
                                @if($product->personalize)
                                    <div class="personalize">
                                        <h5>{{App::getLocale() == 'ar' ? "اسم الطفل ":"Child Name"}}: <br><span>{{$product->child_name}}</span></h5>
                                        <h5>{{App::getLocale() == 'ar' ? "عمر الطفل ":"Child Age"}}: <br><span>{{$product->child_age}}</span></h5>
                                    </div>
                                @endif    
                                </div>
                            </div><hr>
@endforeach
                        </div>
                        <div class="shipping-address">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>{{App::getLocale() =='ar' ? "الشحن الي " : "Shipping to"}}:</h5>
                                    <p>{{App::getLocale() == 'ar' ? "العميل ":"Client"}}: <span>{{$orders->user->first_name }} {{$orders->user->last_name}}</span></p>
                                    <p>{{App::getLocale() == 'ar' ? "العنوان ":"Address"}}: <span>{{$orders->shipping->cities->name_en}}</span></p>
                                    <p>{{App::getLocale() == 'ar' ? "الهاتف ":"Phone"}}: {{$orders->user->phone}}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>{{App::getLocale() == 'ar' ? "طرق الدفع": "Payment method"}}:</h5>
                                    <p>{{App::getLocale() == 'ar' ? " باي بال": "PayPal"}}: *************</p>
                                    <h5>{{App::getLocale() == 'ar' ? "  اجمالي الطلب ": "Total amount"}}:</h5>
                                    <p>EGP {{$orders->price}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cart-summary">
                        <h4>{{App::getLocale() == 'ar' ? 'ملخص الطلب ' : 'order summary'}}</h4>
                            
                            <div class="total-summary">
                                <p>{{App::getLocale() == 'ar' ? "سعر الطلب  ": "subtotal"}}: <span>EGP {{$orders->price}}</span></p>
                                <p>{{App::getLocale() == 'ar' ? " الشحن  ": "shipping"}} : <span>EGP {{$orders->shipping->cost}}</span></p>
                                <p>{{App::getLocale() == 'ar' ? " الضرائب": "taxes"}}: <span>EGP {{ \App\websiteSetting::find(1)->Taxes}}</span></p>
                                <p>{{App::getLocale() == 'ar' ? " الخصم": "discount"}}: <span>EGP {{$orders->discount}}</span></p><hr>
                                <p class="total">{{App::getLocale() == 'ar' ? " السعر الكلي ": "total"}}<span>EGP {{$orders->price }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

age

<script>

    
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

@endsection
