<!doctype html>
<html class="no-js" lang="{{App::getLocale()}}" dir="{{App::getLocale() == 'ar' ? 'rtl':'ltr'}}">

<head>
  <meta charset="utf-8">
        
  <title> 
  Towipi
        </title> 
          
        <!-- add icon link -->
  
        <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">

         <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Place favicon.ico in the root directory -->
<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/normalize.css')}}">

  <meta name="theme-color" content="#fafafa">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Asap:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
  @if(\App::getLocale() == 'en')
  <link href="https://fonts.googleapis.com/css2?family=Asap:wght@500&display=swap" rel="stylesheet">
  @endif
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  @if(\App::getLocale() == 'ar')
  <link rel="stylesheet" href="{{asset('css/main-ar.css')}}">
  @endif
 
  <link rel="stylesheet" href="{{asset('css/media.css')}}">

  
  
  @yield('style')  
</head>

    <body>
        <!--   CONTENT-WRAPPER   -->
        <div class="content">
            <header >
                <div class="menus">
                    <!-- Top navbar -->
                    <nav class="navbar top-nav navbar-expand-lg navbar-light">
                        <div class="container">
                            <div class="row">
                                                            <div class="col-md-6">
                                    <ul class="navbar-nav right ">
                                        <li class="nav-item dropdown" data-toggle="tooltip" title="User">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="{{asset('img/User-account.svg')}}" alt="">
                                            </a>
                                            <!-- User Not Logged In -->
                                            @guest('users')
                                            <div class="dropdown-menu not-loged" aria-labelledby="navbarDropdown">
                                                <a href="/signin" class="dropdown-item btn log">{{App::getLocale() == 'ar' ? "تسجيل الدخول": " sign in"}}</a>
                                                <span class="d-block">{{App::getLocale() == 'ar' ? " او  ": " OR  "}}</span>
                                                <div class="dropdown-divider"></div>
                                                <a href="/signup" class="dropdown-item btn out">{{App::getLocale() == 'ar' ? "تسجيل حساب ": " Creat an account"}}</a>
                                            </div>
                                            @endguest
                                            <!-- IF User Logged In OR Register -->
                                        
                                            @auth('users')
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <span>{{App::getLocale() == 'ar' ? "الحساب": "Account"}}</span>
                                                <div class="dropdown-divider"></div>
                         
                                                <a class="dropdown-item" href="/profile"><img class="order_img" src="{{ asset('img/setting.svg') }}" alt="">{{App::getLocale() == 'ar' ? "الاعدادات": "settings"}}</a>
                                               <a class="dropdown-item" href="/orders"><img class="order_img" src="{{ asset('img/Cart.svg') }}" alt="">{{App::getLocale() == 'ar' ? "الطلبات": "My cart"}}</a>
                                                <a class="dropdown-item" href="/wishlist"><i class="far fa-heart order_img"></i>{{App::getLocale() == 'ar' ? "المفضله": "Whishlist"}}</a>
                                                <div class="dropdown-divider"></div> 
                                                <a class="dropdown-item btn" href="/user/logout"><i class="fas fa-sign-out-alt order_img"></i>{{App::getLocale() == 'ar' ? "تسجيل الخروج": "Log Out"}}</a>
                                
                                             
                                            </div>
                                            @endauth
                                        </li>
                                        @auth('users')
                                        <li class="nav-item" data-toggle="tooltip" data-placement="left" title="WishList">
                                            <a class="nav-link count-wrap" href="/wishlist"><img src="{{ asset('img/Favourite.svg') }}" alt=""><span class="count">{{\App\wishList::where('user_id',\Auth::guard('users')->user()->id)->count()}}</span></a>
                                        </li>
                                        <li class="nav-item cart" data-toggle="tooltip" title="Shopping-cart">
                                            <a class="nav-link count-wrap" href="/cart">
                                                <img src="{{asset('img/cart.svg')}}" alt=""><span class="count">{{\App\cart::where('user_id',\Auth::guard('users')->user()->id)->count()}}</span>
                                            </a>
                                        </li>
                                        @endauth
                                        <li class="nav-item dropdown lang">
                                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">{{App::getLocale() == "ar" ?  "العربية " : "En" }}</a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <ul class="list-unstyled">
                                                    <li><a href="/lang/en">EN</a></li>
                                                    <li> <a href="/lang/ar">AR</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="navbar-nav social">
                                        @if(\App\websiteSetting::find(1)->instagram !==null ) 
                                        <li class="nav-item"><a href="{{\App\websiteSetting::find(1)->instagram}}" class="nav-link insta"><img src="{{asset('img/instagram.svg')}}" alt=""></a></li>
                                        @endif
                                         @if(\App\websiteSetting::find(1)->facebook !==null ) 
                                        <li class="nav-item"><a href="{{\App\websiteSetting::find(1)->facebook}}" class="nav-link fac"><img src="{{asset('img/Facebook.svg')}}" alt=""></a></li>
                                        @endif
                                         @if(\App\websiteSetting::find(1)->youTube !==null ) 
                                        <li class="nav-item"><a href="{{\App\websiteSetting::find(1)->youTube}}" class="nav-link you"><img src="{{asset('img/Youtube.svg')}}" alt=""></a></li>
                                        @endif
                                         @if(\App\websiteSetting::find(1)->pinterest !==null ) 
                                        <li class="nav-item"><a href="{{\App\websiteSetting::find(1)->pinterest}}" class="nav-link pin"><img src="{{asset('img/Pinterest.svg')}}" alt=""></a></li>
                                        @endif
                                         @if(\App\websiteSetting::find(1)->tiktok !==null ) 
                                        <li class="nav-item"><a href="{{\App\websiteSetting::find(1)->tiktok}}" class="nav-link you"><img src="{{asset('img/3046122.svg')}}" alt=""></a></li>
                                        @endif
                                         @if(\App\websiteSetting::find(1)->snapchat !==null ) 
                                        <li class="nav-item"><a href="{{\App\websiteSetting::find(1)->snapchat}}" class="nav-link pin"><img src="{{asset('img/ed752330de094018193026d06f9cabab.png
')}}" alt=""></a></li>
                                        @endif
                                        
                                                                                 @if(\App\websiteSetting::find(1)->twitter !==null ) 
                                        <li class="nav-item"><a href="{{\App\websiteSetting::find(1)->twitter}}" class="nav-link pin"><img src="{{asset('img/download.png
')}}" alt=""></a></li>
                                        @endif
                                        
                                        
                                        
                                        
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </nav>


                    <div class="umbrella"><img src="{{asset('img/shop umbrella.svg')}}" alt=""></div>
                    <!-- Bottom Navbar -->
                    <div class="logo" style="
    position: relative;
    bottom: -10px;
">
                        <div class="container">
                            <div class="row no-gutters row-rever">
                                                                <div class="col-md-5">
                                <a href="/category/1" class="btn category party-btn ml-0 mr-0" style="width: 226px;height: 65px;">
                                     @if(\App::getLocale() =='ar')
                                    <span style="text-align: center;width: auto;display: flex;justify-content: center;margin-left: 25px;">   {{App::getLocale() == 'ar' ? App\category::find('1')->name_ar : App\category::find('1')->name_en }}</span><img src="{{asset('img/buttom-Pink.svg')}}" alt=""></a>
                                    @else
                                     <span style="text-align: center;width: auto;display: flex;justify-content: center;text-transform: capitalize;font-size: 24px;">   {{App::getLocale() == 'ar' ? App\category::find('1')->name_ar : App\category::find('1')->name_en }}</span><img src="{{asset('img/buttom-Pink.svg')}}" alt=""></a>

                                    @endif
                                </div>

                                
                                <div class="col-md-2">
                                    <a href="/" class="logo-img"><img src="{{asset('img/Towipi-logo.svg')}}" alt="Logo" ></a>
                                </div>
                                
                                
                                                                <div class="col-md-5">
                                <a href="/category/2" class="btn category cake-btn ml-0 mr-0" style=" width: 226px;height: 65px;">
                                    @if(\App::getLocale() =='ar')
                                    <span style="text-align: center;width: auto;display: flex;justify-content: center;margin-right: 50px;">{{App::getLocale() == 'ar' ? App\category::find('2')->name_ar : App\category::find('2')->name_en }}</span><img src="{{asset('img/buttom-Pink.svg')}}" alt=""></a>
                                    @else
                                    <span style="text-align: center;width: auto;display: flex;justify-content: center;text-transform: capitalize;font-size: 24px;">{{App::getLocale() == 'ar' ? App\category::find('2')->name_ar : App\category::find('2')->name_en }}</span><img src="{{asset('img/buttom-Pink.svg')}}" alt=""></a>

                                    @endif
                                </div>

                                
                                
                                
                                
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg bottom-nav pb-1" style="
    padding-top: 0px;
    position: relative;
    top: -18px;
">
                        <div class="container" style="
    display: flex;
    justify-content: center;
">
                            <ul class="navbar-nav">

                          
                                                      <li class="nav-item home-li"><a href="/" class="nav-link category home-cat" style="
    margin-top: 0px;
    width: 160px;
    height: 48px;
    text-transform: capitalize;
    font-size: 20px;
       margin: 0 31px;

"><span>{{App::getLocale() == 'ar' ? "الرئيسية" : "Home"}}</span><img src="{{asset('img/buttom-baby-blue.svg')}}" alt=""></a></li>

                            <li class="nav-item" style=""><a href="/about/us" class="nav-link category" style="
    margin-top: 0px;
    width: 160px;
    height: 48px;
    text-transform: capitalize;
    font-size: 20px;
"><span>{{App::getLocale() == 'ar' ? " عن متجرنا  " : "about us"}}</span><img src="{{ asset('img/buttom-baby-blue.svg') }}" alt=""></a></li>


                            <li class="nav-item"><a
href="/contact/us" class="nav-link category touch" 
style="
    margin-top: 0px;
    width: 160px;
    height: 48px;
    text-transform: capitalize;
    font-size: 20px;
"
><span style="
    margin-right: 7px;
    font-size:18px
">{{App::getLocale() == 'ar' ? " تواصل معنا  " : " contact us"}}</span><img src="{{asset('img/buttom-baby-blue.svg')}}" alt=""></a></li>


                            </ul>
                        </div>
                    </nav>
                    <form action="/product/search" method="get" id="searchForm" style="margin-bottom: 0px;position: relative;top: -11px;">
                    <div class="input-group">
          
                        <input type="text" name="name"  form="searchForm" class="form-control" placeholder="{{App::getLocale() == 'ar' ? 'ابحث عن منتجات....':'Search for products...' }}" aria-label="Username" aria-describedby="basic-addon1">
   
                        <div class="input-group-prepend">

@if(App::getLocale() == 'ar')
<button type="submit" form='searchForm'                         style="
    border: none;
    border-color: #F495BE;
    background-color: #F495BE;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
">
@else 
      <button type="submit" form="searchForm" style="
    border: none;
    border-color: #F495BE;
    background-color: #F495BE;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
">
@endif
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                        </button>
                        </div>
              
                    </form>
                     
                    </div>
                </header>

                @component('components.flashMessage') @endcomponent
                @component('components.AuthLoginModel') @endcomponent

                