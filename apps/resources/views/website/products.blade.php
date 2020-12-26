@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/shop.css')}}">
@endsection
@section('content')

        <div class="cart-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">

                        <div class="cart-summary shop-sidebar">
                            <div class="categories">
                                <div class="content-bar">
                                    <div  id="collapseOne" class="collapse show head-bar"  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                                        <h3>{{App::getLocale() == 'ar' ? "الاقسام" : "Category"}}<i class="fa fa-angle-down"></i></h3>
                                    </div>
                                    <div class="bar-content collapse show" id="collapseExample">
                                        <ul class="list-unstyled">
                                            <li class=""><a href="/products">{{App::getLocale() == 'ar' ? "عرض الكل " : "View all"}}</a><span>{{$AllProducts->count()}}</span></li>
                                            @foreach($subCategories as $subCategory)
                                            <li><a href="/products/{{$subCategory->id}}">  {{ App::getLocale() == 'ar' ? $subCategory->name_ar : $subCategory->name_en }}</a><span>{{$AllProducts->where('sub_category_id',$subCategory->id)->count()}}</span></li>
                                   
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div><hr>
                            <div class="categories">
                                <div class="content-bar">
                                    <div id="collapseOne1" class="collapse show head-bar"  data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="true" aria-controls="collapseExample" >
                                        <h3>{{App::getLocale() == 'ar' ? "الاحداث / المناسبات" : "Event / Occasion"}}<i class="fa fa-angle-down"></i></h3>
                                    </div>
                                    <div class="bar-content collapse show" id="collapseTwo">
                                        <ul class="list-unstyled">
                                   

                                        @foreach($occasions as $occasion)
                                            <li><a href="/products/occasion/{{$occasion->id}}">  {{ App::getLocale() == 'ar' ? $occasion->name_ar : $occasion->name_en }}</a><span>{{$occasion->products_count}}</span></li>
                                   
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div><hr>

                            <div class="categories">
                                <div class="content-bar">
                                <div id="collapseOne2" class="collapse show head-bar"  data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="true" aria-controls="collapseThree" >
                                        <h3>{{App::getLocale() == 'ar' ? "الرسومات" : "Character"}}<i class="fa fa-angle-down"></i></h3>
                                    </div>
                                    <div class="bar-content collapse show" id="collapseThree">
                                        <ul class="list-unstyled">
                                        @foreach($characters as $character)
                                            <li><a href="/products/characters/{{$character->id}}">  {{ App::getLocale() == 'ar' ? $character->name_ar : $character->name_en }}</a><span>{{$character->products_count}}</span></li>
                                   
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                
                            </div><hr>

                            <div class="categories">
                                <div class="content-bar">
                                <div id="collapseOne3" class="collapse show head-bar"  data-toggle="collapse" href="#collapseFoure" role="button" aria-expanded="true" aria-controls="collapseExample" >
                                        <h3>{{App::getLocale() == 'ar' ? "نوع الحفل " : "Party Theme"}}<i class="fa fa-angle-down"></i></h3>
                                    </div>
                                    <div class="bar-content collapse show" id="collapseFoure">
                                        <ul class="list-unstyled">
                                            
                                        @foreach($party as $Party_Theme)
                                            <li><a href="/products/party/theme/{{$Party_Theme->id}}">  {{ App::getLocale() == 'ar' ? $Party_Theme->name_ar : $Party_Theme->name_en }}</a><span>{{$Party_Theme->products_count}}</span></li>
                                   
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="product-cards">
                            <div class="row" style="width: 100%;display: flex;justify-content: center;">
                             
                            @if($products->isEmpty())
                            @component('components.emptyWebsite',['sectionِAr'=>'منتجات','sectionِEn'=>'products']) @endcomponent

                            @endif

                            @foreach($products as $product)
                                <div class="col-md-4">

                            @component('components.product',['product'=>$product]) @endcomponent


                                </div>
                         @endforeach

                            </div>  
                        </div>
                        {{ $products->links('vendor.pagination.default') }}
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection