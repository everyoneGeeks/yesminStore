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
                        <h2><img src="img/Shipping.svg" alt="">Track Your Order</h2>
                        <div class="order-steps">
                            <a href="shopping-cart.html" class="step-item active">
                                <div class="step-progress">
                                    <div class="step-count">1</div>
                                </div>
                                <div class="step-label">Cart</div>
                            </a>
                            <a href="checkout.html" class="step-item active">
                                <div class="step-progress">
                                    <div class="step-count">2</div>
                                </div>
                                <div class="step-label">Shipping</div>
                            </a>
                            <a href="payment.html" class="step-item active">
                                <div class="step-progress">
                                    <div class="step-count">3</div>
                                </div>
                                <div class="step-label">Payment</div>
                            </a>
                            <a href="order-tracking.html" class="step-item active current">
                                <div class="step-progress">
                                    <div class="step-count">4</div>
                                </div>
                                <div class="step-label">Tracking</div>
                            </a>
                        </div>
                        <div class="right-msg">
                            <img src="img/Right (sign).svg" alt="">
                            <h3>Your order has been successfully completed <br>
                                You can track your order now
                            </h3>
                        </div>
                        <div class="orders">
                            <div class="order-steps">
                                <a href="shopping-cart.html" class="step-item active">
                                    <div class="step-progress">
                                        <div class="step-count">1</div>
                                    </div>
                                    <div class="step-label">Ready for shipping</div>
                                </a>
                                <a href="checkout.html" class="step-item">
                                    <div class="step-progress">
                                        <div class="step-count">2</div>
                                    </div>
                                    <div class="step-label">Out for delivery</div>
                                </a>
                                <a href="payment.html" class="step-item">
                                    <div class="step-progress">
                                        <div class="step-count">3</div>
                                    </div>
                                    <div class="step-label">Delivered</div>
                                </a>
                            </div>
                            <div class="product-cart-details">
                                <div class="img-section">
                                    <img src="img/happy-birthday-wishes.png" alt="">
                                    <div>
                                        <a href="product-details.html">product name product name product name</a>
                                        <div class="price">
                                            <span class="aft-dis">EGP 50</span>
                                            <span class="bef-dis">EGP 75</span>
                                            <span class="discount">20% off</span>
                                        </div>
                                        <div class="character">
                                            <h5>characters: <span>Micky Mouse</span></h5>
                                        </div>
                                        <div class="size">
                                            <h5>Cupcake Size: <span>SIZE</span></h5>
                                        </div>
                                        <div class="quantity">
                                            <h5>Quantity: <span>QUANTITY</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div><hr>
                            <div class="product-cart-details">
                                <div class="img-section">
                                    <img src="img/happy-birthday-wishes.png" alt="">
                                    <div>
                                        <a href="product-details.html">product name product name product name</a>
                                        <div class="price">
                                            <span class="aft-dis">EGP 50</span>
                                            <span class="bef-dis">EGP 75</span>
                                            <span class="discount">20% off</span>
                                        </div>
                                        <div class="character">
                                            <h5>characters: <span>Micky Mouse</span></h5>
                                        </div>
                                        <div class="size">
                                            <h5>Cupcake Size: <span>SIZE</span></h5>
                                        </div>
                                        <div class="quantity">
                                            <h5>Quantity: <span>QUANTITY</span></h5>
                                        </div>
                                    </div>
                                    <div class="personalize">
                                        <h5>Child Name: <br><span>Ahmed</span></h5>
                                        <h5>Child Age: <br><span>11</span></h5>
                                    </div>
                                </div>
                            </div><hr>
                            <div class="product-cart-details">
                                <div class="img-section">
                                    <img src="img/happy-birthday-wishes.png" alt="">
                                    <div>
                                        <a href="product-details.html">product name product name product name</a>
                                        <div class="price">
                                            <span class="aft-dis">EGP 50</span>
                                            <span class="bef-dis">EGP 75</span>
                                            <span class="discount">20% off</span>
                                        </div>
                                        <div class="character">
                                            <h5>characters: <span>Micky Mouse</span></h5>
                                        </div>
                                        <div class="size">
                                            <h5>Cupcake Size: <span>SIZE</span></h5>
                                        </div>
                                        <div class="quantity">
                                            <h5>Quantity: <span>QUANTITY</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-address">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Shipping to:</h5>
                                    <p>Client: <span>Said Omar</span></p>
                                    <p>Address: <span>15 Alharam, Giza</span></p>
                                    <p>Phone: 01012202020</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Payment method:</h5>
                                    <p>PayPal: *************</p>
                                    <h5>Total amount:</h5>
                                    <p>EGP 255</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cart-summary">
                            <h4>order summary</h4>
                            <div class="total-summary">
                                <p>subtotal: <span>EGP 200</span></p>
                                <p>shipping : <span>EGP 2</span></p>
                                <p>taxes: <span>EGP 2</span></p>
                                <p>discount: <span>EGP 3</span></p><hr>
                                <p class="total">total<span>EGP 201</span></p>
                            </div>
                        </div>
                    </div>
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
