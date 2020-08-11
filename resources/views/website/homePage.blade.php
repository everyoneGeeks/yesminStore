@extends('layoutWebsite.app')
@section('content')

                <!-- Slider Section -->
                <div class="slider top-slider">
                    <div class="container" style="height: inherit;">
                        <div id="Adscarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                            @foreach($ads as $ad)

                            @if($loop->count > $loop->index )
                                @if($loop->first)
                                    <li data-target="#Adscarousel" data-slide-to="0" class="active"></li>
                                @else
                                <li data-target="#Adscarousel" data-slide-to="{{$loop->index}}"></li>
                                @endif
                                @endif
                            @endforeach    
                            </ol>
                            <div class="carousel-inner">
                            @foreach($ads as $ad)
                            @if($loop->first)
                                <div class="carousel-item active">
                                    <img src="{{$ad->image}}"  width="850px" height="650px" alt="...">
                                </div>
                            @else
                                <div class="carousel-item ">
                                    <img src="{{$ad->image}}" width="850px" height="650px" alt="...">
                                </div>
                            @endif
                            @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </header>
<!-- services Section -->
<div class="services">
                <div class="container" style="width: 62%;">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="service">
                                <img src="img/customer-services.svg" alt="">
                                <h5>customer service</h5>
                                <p>You will get support and help to get your order</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="service">
                                <img src="img/VIDEO-TUTORIAL.svg" alt="">
                                <h5>video tutorial</h5>
                                <p>We explain to you how to use our products</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="service">
                                <img src="img/DELIVER-ON-TIME.svg" alt="" class="deliver">
                                <h5>deliver on time</h5>
                                <p>We deliver your order on time</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="service">
                                <img src="img/MANY-PAYMENT-OPTIONS.svg" alt="">
                                <h5 class="payment">many payment options</h5>
                                <p>We offer many local and international payment methods</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- customer pictures section -->
            <div class="slider pic">
                <div class="container">
                    <div id="costomerPhoto" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                        @foreach($costomerPhoto as $photo)

                            @if($loop->count > $loop->index )
                                @if($loop->first)
                                    <li data-target="#costomerPhoto" data-slide-to="0" class="active"></li>
                                @else
                                <li data-target="#costomerPhoto" data-slide-to="{{$loop->index}}"></li>
                                @endif
                                @endif
                        @endforeach    
                        </ol>
                        <div class="carousel-inner">
                        @foreach($costomerPhoto as $photo)
                            @if($loop->first)
                                <div class="carousel-item active">
                                    <img src="{{$photo->image}}"  width="850px" height="650px" alt="...">
                                </div>
                            @else
                                <div class="carousel-item ">
                                    <img src="{{$photo->image}}" width="850px" height="650px" alt="...">
                                </div>
                            @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <!-- customer reviews section -->
            <div class="slider rev">
                <div class="container">
                    <div id="costomerRate" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                        @foreach($costomerRate as $photo)

                            @if($loop->count > $loop->index)
                                @if($loop->first)
                                    <li data-target="#costomerRate" data-slide-to="0" class="active"></li>
                                @else
                                <li data-target="#costomerRate" data-slide-to="{{$loop->index}}"></li>
                                @endif
                                @endif
                        @endforeach    
                        </ol>
                        <div class="carousel-inner">
                        @foreach($costomerRate as $photo)
                            @if($loop->first)
                                <div class="carousel-item active">
                                    <img src="{{$photo->image}}"  width="850px" height="650px" alt="...">
                                </div>
                            @else
                                <div class="carousel-item ">
                                    <img src="{{$photo->image}}" width="850px" height="650px" alt="...">
                                </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Party Supplies (Top selling items )-->
            <div class="product-cards">
                <div class="container" style="width: 65%;">
                    <h4>TOP SELLING ITEMS ( PARTY SUPPLIES )</h4>
                    <div class="top-selling">   
                    @foreach($topSellingProduct as $product)
                    @component('components.product',['product'=>$product]) @endcomponent

                    @endforeach
                    </div>  
                </div>
            </div>

            <!-- Party Supplies (Top selling items )-->
            <div class="product-cards">
                <div class="container" style="width: 65%;">
                    <h4>TOP SELLING ITEMS ( CAKE TOOLS )</h4>
                    <div class="top-selling">   
                    @foreach($newProduct as $product)
                    @component('components.product',['product'=>$product]) @endcomponent

                    @endforeach
                    </div>  
                </div>
            </div>

        </div>


@endsection



@section('javascript')

@if( Session::has('AuthLogin'))
   <script type="text/javascript">
      $(document).ready(function() {
          alert('sss');
        $('#AuthLoginModel').modal();
      });
   </script>
@endif
<script>
$( document ).ready(function() {


   });

</script>

@endsection