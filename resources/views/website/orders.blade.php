@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/orders.css')}}">
@endsection

@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent

<div class="cart-details">
            <div class="container">
                <div class="row">
            

                    @component('components.userInfoDashboardList',['user'=>$user]) @endcomponent

                    
                    <div class="col-md-8">
                        <div class="orders">
                            <h3><img src="{{asset('img/Cart-c.svg')}}" alt="">{{App::getLocale()== 'ar' ? "الطلبات": "Orders"}}</h3>
                            @foreach($orders as $order)
                            <div class="order">
                                <div class="order-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>{{App::getLocale()=='ar' ? "تاريخ الطلب ":"Order placed on"}}: <span> {{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</span></h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6>{{App::getLocale() == 'ar'  ? "طريقة الدفع ": "Payment method"}}: <span>Credit or Debit Cards</span></h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6>{{App::getLocale() == 'ar' ? "رقم الطلب ": "Order ID"}}: <span>#{{$order->order_id}}</span></h6>
                                        </div>
                                    </div>
                                </div>
                                @component('components.orderTrackingProgress',['statu'=>0]) @endcomponent
                                    <div class="order-products">
                                    @foreach($order->orderProduct as $product)

                                        <div class="product">
                                            <div class="details">
                                                <img src="{{$product->main_image}}" alt="">
                                                <div class="product-name">
                                                    <h4>{{App::getLocale() == 'ar' ?  $product->name_ar: $product->name_en}}</h4>
                                                    <div class="review">
                                                        <h6>{{App::getLocale() == 'ar' ? " قيم المنتج": "Rate this product"}}:</h6>
                                                        <span>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </span>
                                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="#" class="btn">FILE A COMPLAINT</a>
                                                    <a href="#" class="btn">RETURN ITEM</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach    
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('javascript')

