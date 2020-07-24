@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/product-details.css')}}">
@endsection
@section('content')


<div class="product-details">
            <div class="container">
                <div class="details-tabs">
                    <div class="details">
                        <div class="row">
                            <div class="col-md-7">
                                <img class="main-img" src="{{asset($product->main_image)}}" alt="product-image">
                                <div class="image-gallery">
                                    @foreach($product->images as $image)
                                    <img src="{{asset($image->image)}}" alt="#">
                                    @endforeach
                                </div>
                                
                                <iframe width="420" height="300" src="{{$product->url}}">
                                </iframe>
                            </div>
                            <div class="col-md-5">
                                <h4 class="pro-name">{{App::getLocale() == 'ar' ?  $product->name_ar: $product->name_en}}</h4>
                                <div class="price">
                                    @if($product->discount !== 0 )
                                    <span class="aft-dis">EGP {{$product->price - $product->price*$product->discount/100 }}</span>
                                    <span class="bef-dis">EGP {{$product->price}}</span>
                                    <span class="discount">{{$product->discount}}% </span>
                                    @else 

                                    @endif
                                </div><hr>

                                @if($product->character)
                                <div class="character">
                                    <h5>{{App::getLocale() == 'ar' ? "الرسومات" : "character"}}</h5>
                                    <select class="custom-select form-control" id="inputGroupSelect03">
                                        <option selected>Mini...</option>
                                        @foreach($product->character as $character)
                                      
                                        <option value="{{ $character->id }}">{{App::getLocale() == 'ar'? $character->name_ar:$character->name_en}}</option>
                                        @endforeach
                                
                                    </select>
                                </div>
                                @endif

                                @if($product->occasion)
                                <div class="character">
                                    <h5>{{App::getLocale() == 'ar' ? "المناسبة / الحدث" : "Event / Occasion"}}</h5>
                                    <select class="custom-select form-control" id="inputGroupSelect03">
                                        <option selected>Mini...</option>
                                        @foreach($product->occasion as $occasion)
                                      
                                        <option value="{{ $occasion->id }}">{{App::getLocale() == 'ar'? $occasion->name_ar:$occasion->name_en}}</option>
                                        @endforeach
                                
                                    </select>
                                </div>
                                @endif


                                @if($product->party_theme)
                                <div class="character">
                                    <h5>{{App::getLocale() == 'ar' ? "نوع الحفلة " : "party theme"}}</h5>
                                    <select class="custom-select form-control" id="inputGroupSelect03">
                                        <option selected>Mini...</option>
                                        @foreach($product->party_theme as $party_theme)
                                        <option value="{{ $party_theme->id }}">{{App::getLocale() == 'ar' ? $party_theme->name_ar:$party_theme->name_en}}</option>
                                        @endforeach
                                
                                    </select>
                                </div>
                                @endif
                                @if($product->size)
                                <div class="size">
                                    <h5>{{App::getLocale() == 'ar' ? " الحجم" : "size "}}</h5>
                                    <select class="custom-select form-control" id="inputGroupSelect03">
                                        <option selected>Mini...</option>
                                        @foreach($product->size as $size)
                                        <option value="{{ $size->id }}">{{App::getLocale() == 'ar' ? $size->name_ar:$size->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                <div class="quantity">
                                    <span class="qun"><label for="quantity">{{App::getLocale() == 'ar' ? "":"QTY"}}</label>
                                    <input type="number" name="quantity" id="quantity" min="0" max="{{$product->amount}}">
                                    </span>
                                    <span class="availability"> {{App::getLocale() == 'ar' ? "في المخزن":"In stock"}} {{$product->amount}}</span>
                                </div>
                                
                                <hr>

                                <div class="add">
                                    <button class="btn add-cart"><a href="#"><img src="{{asset('img/cart.svg')}}" alt=""> {{App::getLocale() == 'ar' ? "اضافة الي السلة":"Add To Cart" }}</a></button>
                                    <a href="#" class="wishlist"><i class="far fa-heart"></i>{{App::getLocale() == 'ar' ? "  اضافة الي المفضلة ":"Add To Wishlist" }}</a>
                                </div><hr>
                                <div class="brief-desc">
                                    <h4> {{App::getLocale() == 'ar' ? " تفاصيل المنتج  ":"Product Details" }}</h4>
                                    <p> {{App::getLocale() == 'ar' ?  $product->description_ar: $product->description_en }}</p>

                                    <p class="share">{{App::getLocale() == 'ar' ?  "  مشاركة ": "Share "}}:
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;src=sdkpreparse"
   class="fb-xfbml-parse-ignore">
  <img src="{{asset('img/Facebook.svg')}}" alt="">
  </a>
                                     <a href="#"><img src="{{asset('img/Pinterest.svg')}}" alt=""></a>
                                     
                                     </p>

  

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">...</div-->
                    <div class="reviews">
                        <h3>{{App::getLocale() == 'ar' ?  " التقيم": "Reviews"}}</h3>
                        <div class="row avg-rating">
                            <div class="col-md-4">
                        
                                <h2>  {{$product->rateProduct->count()  }} {{App::getLocale() == 'ar' ?  " التقيم": "Reviews"}}</h2>
                                @if($product->rateProduct->count() !==0)
                                @component('components.rate',['rate'=>$product->rateProduct->sum('rate') / $product->rateProduct->count()]) @endcomponent
                                @else 
                                @component('components.rate',['rate'=>0]) @endcomponent
                                @endif
                                <span class="overall-rating">   {{ $product->rateProduct->count() == 0  ?  0: $product->rateProduct->sum('rate') /$product->rateProduct->count()   }} {{App::getLocale() == 'ar' ?  " تقييم عام": "Overall rating"}}</span>
                            </div>
                            
                            <div class="col-md-8">
                                <div class="star-numbers">
                                    <div class="star-number">
                                        <span>5</span>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="w-100">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{$product->rateProduct->where('rate',5)->count()*$product->rateProduct->count()*100}}%" aria-valuenow="{{$product->rateProduct->where('rate',5)->count()*$product->rateProduct->count()/100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="rating-number">{{$product->rateProduct->where('rate',5)->count()}}</span>
                                </div>
                                <div class="star-numbers">
                                    <div class="star-number">
                                        <span>4</span>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="w-100">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{$product->rateProduct->where('rate',4)->count()*$product->rateProduct->count()*100}}%" aria-valuenow="{{$product->rateProduct->where('rate',4)->count()*$product->rateProduct->count()/100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="rating-number">{{$product->rateProduct->where('rate',4)->count()}}</span>
                                </div>
                                <div class="star-numbers">
                                    <div class="star-number">
                                        <span>3</span>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="w-100">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{$product->rateProduct->where('rate',3)->count()*$product->rateProduct->count()*100}}%" aria-valuenow="{{$product->rateProduct->where('rate',3)->count()*$product->rateProduct->count()/100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="rating-number">{{$product->rateProduct->where('rate',3)->count()}}</span>
                                </div>
                                <div class="star-numbers">
                                    <div class="star-number">
                                        <span>2</span>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="w-100">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{$product->rateProduct->where('rate',2)->count()*$product->rateProduct->count()*100}}%" aria-valuenow="{{$product->rateProduct->where('rate',2)->count()*$product->rateProduct->count()/100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="rating-number">{{$product->rateProduct->where('rate',2)->count()}}</span>
                                </div>
                                <div class="star-numbers">
                                    <div class="star-number">
                                        <span>1</span>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="w-100">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{$product->rateProduct->where('rate',1)->count()*$product->rateProduct->count()*100}}%" aria-valuenow="{{$product->rateProduct->where('rate',1)->count()*$product->rateProduct->count()/100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <span class="rating-number">{{$product->rateProduct->where('rate',1)->count()}}</span>
                                </div>
                            </div>
                        </div><hr>
                        <div class="reviews">
                            <div class="row">
                            @foreach($rateProduct as $rate)
                                <div class="col-md-6">
                                    <div class="customer-reviews">
                                        <div class="customer-info">
                                            <div class="main-cust-info">
                                                <img src="{{asset($rate->user->image)}}" alt="">
                                                <div class="sub-info">
                                                    <h5 class="name">{{$rate->user->name}}</h5>
                                                    @component('components.rate',['rate'=>$rate->rate]) @endcomponent
                                                    <p>{{$rate->comment}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                    <hr>
                                </div>
                            
                                @endforeach
                                {{ $rateProduct->links('vendor.pagination.default') }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="product-cards">
            <div class="container">
                <h4>{{App::getLocale() == 'ar' ?  "منتجات مشابهة ": "RELATED PRODUCTS"}}</h4>
                <div class="top-selling">   
                    
                @foreach($RelatedProduct as $product)
                    @component('components.product',['product'=>$product]) @endcomponent

                    @endforeach

                </div>  
            </div>
        </div>
    </div>



@endsection

@section('script')

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v7.0" nonce="n5b6h5re"></script>

@endsection