@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/checkout.css')}}">
@endsection

@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent
<div class="cart-details">
            <div class="container">
                <div class="row">
              
                    <div class="col-md-7">


                    <h2><img src="{{asset('img/Cart-c.svg')}}" alt="">{{App::getLocale() == 'ar' ? "سلة التسوق": "your shopping cart"}}</h2>

                    
                    @component('components.orderProgress',['statu'=>1]) @endcomponent
                    

   
@if($Alladdress)
@component('components.checkoutUserAddress',['cart'=>$cart,'Alladdress'=>$Alladdress,'Countries'=>$Countries,'cities'=>$cities]) @endcomponent
@component('components.checkoutNewAddress',['Countries'=>$Countries,'cities'=>$cities]) @endcomponent
@else 
@component('components.checkoutNewAddress',['Countries'=>$Countries,'cities'=>$cities]) @endcomponent

@endif 
<div class="proceed row">
    <form action="/address/cart" method="get" id="Address">

</form>
                                <div class="col-md-6">
                                    <a href="/cart" class="btn btn-block back"><i class="fa fa-angle-{{App::getLocale() == 'ar' ? 'right': 'left'}}"></i>  {{App::getLocale() == 'ar' ? " العودة الي سلة التسوق  ": "back to cart"}} </a>
                                </div>
                                <div class="col-md-6">
                                    <button href="#" type="submit" form="Address" type="submit" class="btn btn-block go-proceed"> {{App::getLocale() == 'ar' ? "  الذهاب الي الدفع  ": "proceed to payment "}} <i class="fa fa-angle-{{App::getLocale() == 'ar' ? 'left': 'right'}}"></i></button>
                                </div>
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
