<!doctype html>
<html class="no-js" lang="{{App::getLocale()}}" dir="{{App::getLocale() == 'ar' ? 'rtl':'ltr'}}">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link href="https://fonts.googleapis.com/css2?family=Asap:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/normalize.css')}}">

  <meta name="theme-color" content="#fafafa">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
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
            <header class="home">
                <div class="menus">
                    <!-- Top navbar -->
                    <nav class="navbar top-nav navbar-expand-lg navbar-light">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="navbar-nav social">
                                        <li class="nav-item"><a href="#" class="nav-link insta"><img src="{{asset('img/instagram.svg')}}" alt=""></a></li>
                                        <li class="nav-item"><a href="#" class="nav-link fac"><img src="{{asset('img/Facebook.svg')}}" alt=""></a></li>
                                        <li class="nav-item"><a href="#" class="nav-link you"><img src="{{asset('img/Youtube.svg')}}" alt=""></a></li>
                                        <li class="nav-item"><a href="#" class="nav-link pin"><img src="{{asset('img/Pinterest.svg')}}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="navbar-nav right">
                                        <li class="nav-item dropdown" data-toggle="tooltip" title="User">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="{{asset('img/User-account.svg')}}" alt="">
                                            </a>
                                            <!-- User Not Logged In -->
                                            @if(Auth::guest() == true)
                                            <div class="dropdown-menu not-loged" aria-labelledby="navbarDropdown">
                                                <a href="login.html" class="dropdown-item btn log">{{App::getLocale() == 'ar' ? "تسجيل الدخول": " signin"}}</a>
                                                <span class="d-block">{{App::getLocale() == 'ar' ? " او  ": " OR  "}}</span>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item btn out">{{App::getLocale() == 'ar' ? "تسجيل حساب ": " Creat an account"}}</a>
                                            </div>
                                            @endif
                                            <!-- IF User Logged In OR Register -->
                                            @if(Auth::guest())
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <span>{{App::getLocale() == 'ar' ? "الحساب": "Account"}}</span>
                                                <div class="dropdown-divider"></div>
                         
                                                <a class="dropdown-item" href="profile.html"><i class="fas fa-cog"></i>{{App::getLocale() == 'ar' ? "الاعدادات": "settings"}}</a>
                                                <a class="dropdown-item" href="orders.html"><i class="fas fa-shopping-basket"></i>{{App::getLocale() == 'ar' ? "الطلبات": "Orders"}}</a>
                                                <a class="dropdown-item" href="wishlist.html"><i class="far fa-heart"></i>{{App::getLocale() == 'ar' ? "المفضله": "Favorites"}}</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item btn" href="#"><i class="fas fa-sign-out-alt"></i>{{App::getLocale() == 'ar' ? "تسجيل الخروج": "Log Out"}}</a>
                                
                                             
                                            </div>
                                            @endif
                                        </li>
                                        @if(Auth::guest() == false)
                                        <li class="nav-item" data-toggle="tooltip" data-placement="left" title="WishList">
                                            <a class="nav-link count-wrap" href="wishlist.html"><img src="{{ asset('img/Favourite.svg') }}" alt=""><span class="count">0</span></a>
                                        </li>
                                        <li class="nav-item cart" data-toggle="tooltip" title="Shopping-cart">
                                            <a class="nav-link count-wrap" href="shopping-cart.html">
                                                <img src="{{asset('img/cart.svg')}}" alt=""><span class="count">0</span>
                                            </a>
                                        </li>
                                        @endif
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
                            </div>
                        </div>
                    </nav>


                    <div class="umbrella"><img src="{{asset('img/shop-umberella.svg')}}" alt=""></div>
                    <!-- Bottom Navbar -->
                    <div class="logo">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-5">
                                    <a href="/category/1" class="btn category cake-btn"><span>   {{App::getLocale() == 'ar' ? App\category::find('1')->name_ar : App\category::find('1')->name_en }}</span><img src="{{asset('img/buttom-Pink.svg')}}" alt=""></a>
                                </div>
                                <div class="col-md-2">
                                    <a href="/category/1" class="logo-img"><img src="{{asset('img/Towipi-logo.svg')}}" alt="Logo"></a>
                                </div>
                                <div class="col-md-5">
                                    <a href="/category/2" class="btn category party-btn"><span>{{App::getLocale() == 'ar' ? App\category::find('2')->name_ar : App\category::find('2')->name_en }}</span><img src="{{asset('img/buttom-Pink.svg')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg bottom-nav">
                        <div class="container">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a href="index.html" class="nav-link category">{{App::getLocale() == 'ar' ? "الرائسية" : "Home"}}<Span></Span><img src="{{asset('img/buttom-baby-blue.svg')}}" alt=""></a></li>
                                <li class="nav-item"><a href="about.html" class="nav-link category"><span>{{App::getLocale() == 'ar' ? "من نحن " : "about us"}}</span><img src="{{ asset('img/buttom-baby-blue.svg') }}" alt=""></a></li>
                                <li class="nav-item"><a href="contact.html" class="nav-link category"><span>{{App::getLocale() == 'ar' ? " تواصل معنا  " : " contact us"}}</span><img src="{{asset('img/buttom-baby-blue.svg')}}" alt=""></a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="{{App::getLocale() == 'ar' ? 'ابحث عن منتجات....':'Search for products...' }}" aria-label="Username" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                            <a href="#"><span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span></a>
                        </div>
                    </div>
                </div>
                </header>