<!--   FOOTER   -->   <!--   FOOTER   -->   <!--   FOOTER   -->
     <footer style="">
            <div class="main-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="logo-footer" src="{{asset('img/Towipi-logo.svg')}}" alt="logo">
                            <h3 style="font-family: 'Asap', sans-serif;;font-weight: bold; position: relative;
    left: 1px">{{App::getLocale() == 'ar' ?  "  تابعنا |  تواصل معنا " :"FOLLOW US | CONTACT US"}}</h3>
    
    @if(App::getLocale() =='ar') 
                            <ul class="navbar-nav social" style="
    position: relative;
    left: 1px;
">
       @if(\App\websiteSetting::find(1)->pinterest !==null )                                        

<li class="nav-item"><a href="{{\App\websiteSetting::find(1)->pinterest}}" class="nav-link "><img src="{{asset('img/pinterest-footer.svg')}}" alt=""></a></li>
@endif
       @if(\App\websiteSetting::find(1)->youTube !==null )                                        

<li class="nav-item"><a href="{{\App\websiteSetting::find(1)->youTube}}" class="nav-link "><img src="{{asset('img/youtube-footer.svg')}}" alt=""></a></li>
@endif

       @if(\App\websiteSetting::find(1)->facebook !==null )                                        

<li class="nav-item"><a href="{{\App\websiteSetting::find(1)->facebook}}" class="nav-link "><img src="{{asset('img/facebook-footer.svg')}}" alt=""></a></li>
@endif

       @if(\App\websiteSetting::find(1)->instagram !==null )                                        

<li class="nav-item"><a href="{{\App\websiteSetting::find(1)->instagram}}" class="nav-link "><img src="{{asset('img/instagram-footer.svg')}}" alt=""></a></li>
@endif

       @if(\App\websiteSetting::find(1)->tiktok !==null )                                        

<li class="nav-item"><a href="{{\App\websiteSetting::find(1)->tiktok}}" class="nav-link "><img src="{{asset('img/tiktok.svg')}}" alt=""></a></li>
@endif

       @if(\App\websiteSetting::find(1)->snapchat !==null )                                        

<li class="nav-item"><a href="{{\App\websiteSetting::find(1)->snapchat}}" class="nav-link "><img src="{{asset('img/Snapchat.svg')}}" alt=""></a></li>
@endif

       @if(\App\websiteSetting::find(1)->twitter !==null )                                        

<li class="nav-item"><a href="{{\App\websiteSetting::find(1)->twitter}}" class="nav-link "><img src="{{asset('img/twitter.svg')}}" alt=""></a></li>   
@endif

                                    </ul>
                                    @else 
                                    
                            <ul class="navbar-nav social" style="
    position: relative;
    right: 1px;
">
                                       @if(\App\websiteSetting::find(1)->youTube !==null )                                        

<li class="nav-item"><a href="{{\App\websiteSetting::find(1)->youTube}}" class="nav-link "><img src="{{asset('img/youtube-footer.svg')}}" alt=""></a></li>
@endif

       @if(\App\websiteSetting::find(1)->pinterest !==null )                                        

<li class="nav-item"><a href="{{\App\websiteSetting::find(1)->pinterest}}" class="nav-link "><img src="{{asset('img/pinterest-footer.svg')}}" alt=""></a></li>
@endif

       @if(\App\websiteSetting::find(1)->instagram !==null )                                        


<li class="nav-item"><a href="{{\App\websiteSetting::find(1)->instagram}}" class="nav-link "><img src="{{asset('img/instagram-footer.svg')}}" alt=""></a></li>
@endif

       @if(\App\websiteSetting::find(1)->facebook !==null )                                        

<li class="nav-item"><a href="{{\App\websiteSetting::find(1)->facebook}}" class="nav-link "><img src="{{asset('img/facebook-footer.svg')}}" alt=""></a></li>
@endif

       @if(\App\websiteSetting::find(1)->snapchat !==null )                                        

<li class="nav-item"><a href="{{\App\websiteSetting::find(1)->snapchat}}" class="nav-link "><img src="{{asset('img/Snapchat.svg')}}" alt=""></a></li>
@endif

       @if(\App\websiteSetting::find(1)->tiktok !==null )                                        

<li class="nav-item"><a href="{{\App\websiteSetting::find(1)->tiktok}}" class="nav-link "><img src="{{asset('img/tiktok.svg')}}" alt=""></a></li>
@endif

       @if(\App\websiteSetting::find(1)->twitter !==null )                                        

<li class="nav-item"><a href="{{\App\websiteSetting::find(1)->twitter}}" class="nav-link "><img src="{{asset('img/twitter.svg')}}" alt=""></a></li>
@endif


                                    </ul>
                                    @endif
                        </div>
                        <div class="col-md-6">
                            <ul class="navbar-nav links">
                                <li class="nav-item"><a href="/about/us" class="nav-link" style="    font-family: 'Asap', sans-serif;">{{App::getLocale() == 'ar' ? "  عن متجرنا  ":"ABOUT US"}}</a></li>
                                <li class="nav-item"><a href="/contact/us" class="nav-link" style="    font-family: 'Asap', sans-serif;">{{App::getLocale() == 'ar' ? " تواصل معنا ":"CONTACT US"}}</a></li>
                                <li class="nav-item"><a href="/policy" class="nav-link" style="    font-family: 'Asap', sans-serif;">{{App::getLocale() == 'ar' ? " سياسة الخصوصية  ":"Privacy Policy"}}</a></li>
                                <li class="nav-item"><a href="/delivery/returns" class="nav-link" style="    font-family: 'Asap', sans-serif;">{{App::getLocale() == 'ar' ? " التوصيل  و  الاسترجاع   ":"Delivery & Returns"}}</a></li>
                                <li class="nav-item"><a href="/faq" class="nav-link" style="font-family: 'Asap', sans-serif;">{{App::getLocale() == 'ar' ? " الاسئلة الشائعة  ":"FAQs"}}</a></li>
                            </ul>
                            
                            <div class="payment-options">
                                <div>
                                    <img src="{{asset('img/visa.svg')}}" width="81px" height="28px" alt="">
                                    <img src="{{asset('img/fawry.svg')}}" width="137px" height="77px" alt="">
                                </div>
                                <div>
                                    <img src="{{asset('img/master.svg')}}" width="120px" height="70px" alt="">
                                    <img src="{{asset('img/paypal.svg')}}" width="120px" height="70px"  alt="">
                                </div>
                                <div>
                                    @if(App::getLocale()=='ar')
                                    <img src="{{asset('img/cash.svg')}}" width="134px" height="44px" alt="" style="
    position: relative;
    right: 78px;
">
@else 

                                    <img class="cash" src="{{asset('img/cash.svg')}}" width="134px" height="44px" alt="" style="
    position: relative;
    left: 78px;
">
@endif
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>

            <div class="bottom-footer">
                <div class="container">
                    <p class="copy">Copyright © 2020 towipi.com All Rights Reserved</p>
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


