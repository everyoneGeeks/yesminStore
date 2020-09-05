<!--   FOOTER   -->   <!--   FOOTER   -->   <!--   FOOTER   -->
     <footer>
            <div class="main-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="logo-footer" src="{{asset('img/Towipi-logo.svg')}}" alt="logo">
                            <h3>{{App::getLocale() == 'ar' ? "تواصل معنا | تابعنا " :"FOLLOW US | CONTACT US"}}</h3>
                            <ul class="navbar-nav social">
                                        <li class="nav-item"><a href="{{\App\websiteSetting::find(1)->instagram}}" class="nav-link "><img src="{{asset('img/instagram-footer.svg')}}" alt=""></a></li>
                                        <li class="nav-item"><a href="{{\App\websiteSetting::find(1)->facebook}}" class="nav-link "><img src="{{asset('img/facebook-footer.svg')}}" alt=""></a></li>
                                        <li class="nav-item"><a href="{{\App\websiteSetting::find(1)->youTube}}" class="nav-link "><img src="{{asset('img/youtube-footer.svg')}}" alt=""></a></li>
                                        <li class="nav-item"><a href="{{\App\websiteSetting::find(1)->pinterest}}" class="nav-link "><img src="{{asset('img/pinterest-footer.svg')}}" alt=""></a></li>
                                    </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="navbar-nav links">
                                <li class="nav-item"><a href="/about/us" class="nav-link">{{App::getLocale() == 'ar' ? " من نحن ":"ABOUT US"}}</a></li>
                                <li class="nav-item"><a href="/contact/us" class="nav-link">{{App::getLocale() == 'ar' ? " تواصل معنا ":"CONTACT US"}}</a></li>
                                <li class="nav-item"><a href="/policy" class="nav-link">{{App::getLocale() == 'ar' ? " سياسة الخصوصية  ":"Privacy Policy"}}</a></li>
                                <li class="nav-item"><a href="/delivery/returns" class="nav-link">{{App::getLocale() == 'ar' ? " التوصيل & والاسترجاع   ":"Delivery & Returns"}}</a></li>
                                <li class="nav-item"><a href="/faq" class="nav-link">{{App::getLocale() == 'ar' ? " الاسئلة الشائعة  ":"FAQs"}}</a></li>
                            </ul>
                            <div class="payment-options">
                                <div>
                                    <img src="{{asset('img/visa.svg')}}" alt="">
                                    <img src="{{asset('img/fawry.svg')}}" alt="">
                                </div>
                                <div>
                                    <img src="{{asset('img/master.svg')}}" alt="">
                                    <img src="{{asset('img/paypal.svg')}}" alt="">
                                </div>
                                <div>
                                    <img src="{{asset('img/cash.svg')}}" alt="" style="
    position: relative;
    right: 57px;
">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="bottom-footer">
                <div class="container">
                    <p class="copy">Copyright © 2020 towipi.com All Rights Reserved.</p>
                </div>
            </div>
        </footer>

    
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>');</script>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
                        @if(\App::getLocale() == 'ar')
        <script src="{{asset('js/plugins.js')}}"></script>
        @else 
        <script src="{{asset('js/plugins-en.js')}}"></script>
        @endif
        @yield('javascript')  
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="//code.tidio.co/rw3ukwxdtobrfotxlqun6b6sfb8krcet.js" async></script>


        
        <!-- additional js files  -->
        
@if( Session::has('AuthLogin'))
   <script type="text/javascript">
      $(document).ready(function() {
         
        $('#AuthLoginModel').modal();
      });
   </script>
@endif


      
    </body>

</html>


