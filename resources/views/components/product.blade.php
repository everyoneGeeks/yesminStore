
<div class="card">
     <div class="pro-img">
          <a href="/product/info/{{$product->id}}"><img src="{{$product->main_image}}" alt="product"></a>
          @if(Carbon\Carbon::now()->greaterThanOrEqualTo(Carbon\Carbon::parse($product->created_at)) 
&& Carbon\Carbon::now()->lessThanOrEqualTo(Carbon\Carbon::parse($product->created_at)->addDays(3)))
          <span class="status badge badge-primary">{{App::getLocale() == 'ar' ? "جديد":"New"}}</span>
          @endif
          @if($product->discount > 0)
          <span class="status badge badge-warning">-{{$product->discount}}%</span>
          @endif
     </div>
     <div class="pro-desc">
          <div class="pro-info">
               <a href="/product/info/{{$product->id}}">
               <h4 class="pro-name">
               @if(App::getLocale() == 'ar')
               {{ $product->name_ar }}
               @else 
  
               {{ $product->name_en }}
               @endif
               </h4></a>
               <span class="price">
               <span class="aft-dis">EGP {{$product->price}}</span></span>
          </div>
          <div class="cart-view">
               <a  href="product/add/cart/{{$product->id}}" class="btn add-cart">{{App::getLocale() == 'ar' ? "شراء":"Buy"}}</a>
               <a  href="product/info/{{$product->id}}" class="btn q-view">{{App::getLocale() == 'ar' ? "مشاهدة":"View"}}</a>
               <a  href="product/add/favorite/{{$product->id}}"class="btn fav"><i class="far fa-heart"></i></a>
          </div>
     </div>
</div>