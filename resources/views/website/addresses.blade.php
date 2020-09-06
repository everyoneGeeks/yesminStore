@extends('layoutWebsite.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/addresses.css')}}">
@endsection

@section('content')
@component('components.Websiteerror',['errors'=>$errors ?? NULL]) @endcomponent
<div class="cart-details">
            <div class="container">
                <div class="row">
                @component('components.userInfoDashboardList',['user'=>$user]) @endcomponent
                <div class="col-md-8">
<h3 class="add-header"><img src="{{asset('img/Location.svg')}}" alt="">{{App::getLocale() == 'ar' ? "عناوين الشحن":"Shipping Addresses"}}
<span style="
    display: inline-block;
    float: left;
">
<button  style="
    background-color: pink;
    color: #fff;
" class ="btn btn-defualt " role="button" data-toggle="collapse" href="#Address-add"
             aria-expanded="false" aria-controls="Address-add">
        <h5>{{App::getLocale() == 'ar' ?  "اضافة عنوان   " : "add  address"}}<i class="fa fa-angle-down"></i>
        </h5>
</buton>   
</span>
</h3>


@if($user->address)
@component('components.userAddress',['user'=>$user,'Countries'=>$Countries,'cities'=>$cities]) @endcomponent
@endif

@component('components.newAddress',['Countries'=>$Countries,'cities'=>$cities]) @endcomponent

</div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('javascript')
<script>
$( document ).ready(function() {
    $('.country').change(function(){

    $('#city-'+$(this).attr('data-address')+' '+'option')
        .hide() // hide all
        .filter('[data-country="'+$(this).val()+'"]') // filter options with required value
            .show(); // and show them
});
});


</script>

<script>

$( document ).ready(function() {
$('.countryAddress').change(function(){
    var countryID = $(this).val();    
    var cityAddress=$(this).attr('data-address');
    if(countryID){
        $.ajax({
           type:"GET",
           url:'/shipping/cities/'+countryID,
           success:function(res){               
            if(res){
             $('#city-'+cityAddress).empty();
             $('#city-'+cityAddress).append('<option>Select</option>');
                $.each(res,function(key,value){
        
                    if(key=='data'){
                    value.forEach(function(city,index, value){

                    console.log(city);
                    @if(App::getLocale() == 'ar')
                    $('#city-'+cityAddress).append('<option value="'+city.cities.id+'">'+city.cities.name_ar+'</option>');
                

                    @else 
                    $('#city-'+cityAddress).append('<option value="'+city.cities.id+'">'+city.cities.name_en+'</option>');


                    @endif
                });
                }
                });
           
            }else{
                $('#city-'+cityAddress).empty();
            }
           }
        });
    }else{
        $('#city-'+cityAddress).empty();

    }      
   });







$('.cityAddress').change(function(){
    var cityId = $(this).val();    
    if(cityId){
        $.ajax({
           type:"GET",
           url:'/shipping/cost/'+cityId,
           success:function(res){               
            if(res){
                $.each(res,function(key,value){
        
                    if(key=='data'){
                    

                        $('#Shipping').empty();
                         $('#Shipping').text('EGP'+" "+value.cost);
              
                }
                });
           
            }else{
                $('#Shipping').text('EGP 0');
            }
           }
        });
    }else{
        $('#Shipping').text('EGP 0');

    }      
   });
});

</script>

@endsection
