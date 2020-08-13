@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/wishlist.css')}}">
@endsection

@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent
<div class="cart-details">
            <div class="container">
                <div class="row">
                @component('components.userInfoDashboardList',['user'=>$user]) @endcomponent
                <div class="col-md-8">
                        <div class="products">
                            <h3><img src="img/Whishlist.svg" alt="">{{App::getLocale() == 'ar' ?  "المفضلة": "Wishlist"}}</h3>
                            @foreach($wishLists as $wishList)
                            <div class="product-cart-details">
                                <div class="img-section">
                                    <div class="image">
                                        <img src="{{asset($wishList->product->main_image)}}" alt="" class="pro-img">
                                        <a href="/wishlist/delete/{{$wishList->product_id}}">{{App::getLocale() == 'ar' ?  "حذف": "Remove"}}</a>
                                    </div>
                                    <div class="details">
                                        <a href="/product/info/{{$wishList->product->id}}" class="name">
                                        <h4>

                                        @if(App::getLocale() == 'ar')
                                        {{ $wishList->product->name_ar }}
                                        @else 
                            
                                        {{ $wishList->product->name_en }}
                                        @endif
                                        </h4></a>
                                        <div class="price">
                                        @if($wishList->discount > 0)
                                    <span class="aft-dis">EGP {{$wishList->price - $wishList->price*$wishList->discount/100 }}</span>
                                    <span class="bef-dis">EGP {{$wishList->price}}</span>
                                    <span class="discount">{{$wishList->discount}}% </span>
                                    @else 
                           
                                    <span class="aft-dis">EGP {{$wishList->price}}</span>
                                    @endif
                                        </div>
                                    </div>
                                    <a href="/cart/add/{{$wishList->product_id}}" class="btn">{{App::getLocale() == 'ar' ?  "اضافة الي السله ": "Add to cart"}} <img src="{{asset('img/cart.svg')}}" alt=""></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{ $wishLists->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>

@endsection

