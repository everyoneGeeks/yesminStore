<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use App\subCategory;
use Carbon\Carbon;
use App\Party_Theme;
use App\characters;
use App\occasion;
use App\rateProduct;
/*
|--------------------------------------------------------------------------
| productConroller
|--------------------------------------------------------------------------
| this will handle all product user part (CRUD) 
|
*/
/**
                     _            _   
                    | |          | |  
 _ __  _ __ ___   __| |_   _  ___| |_ 
| '_ \| '__/ _ \ / _` | | | |/ __| __|
| |_) | | | (_) | (_| | |_| | (__| |_ 
| .__/|_|  \___/ \__,_|\__,_|\___|\__|
| |                                   
|_|                                   

 */
class productConroller extends Controller
{
    
/**
 * Show  products by subcategories page
 * @param int $id
 * @return \Illuminate\Contracts\Support\Renderable
 */
public function products($id){
    $subCategories=subCategory::get();
    $occasions=occasion::get();
    $party=Party_Theme::get();
    $characters=characters::get();
    $products=product::where('sub_category_id',$id)->paginate(12);
    $AllProducts=product::get();

    return view('website.products',compact('products','AllProducts','characters','party','occasions','subCategories'));

}



/**
 * Show  product Info
 * @param int $id
 * @return \Illuminate\Contracts\Support\Renderable
 */
public function productInfo($id){
    $subCategories=subCategory::get();
    $product=product::where('id',$id)->with('size')->with('character')->with('images')->with('occasion')->with('party_theme')->with('rateProduct')->first();
    $RelatedProduct=product::where('sub_category_id',$product->sub_category_id)->take(8)->get(); 
    
    $rateProduct=rateProduct::where('product_id',$product->id)->paginate(4); 

    return view('website.productsInfo',compact('product','RelatedProduct','subCategories','rateProduct'));
} 

/**
 * Show  all products 
 * @param int $id
 * @return \Illuminate\Contracts\Support\Renderable
 */
public function Allproducts(){
    $subCategories=subCategory::get();
    $occasions=occasion::get();
    $party=Party_Theme::get();
    $characters=characters::get();
    $products=product::paginate(12);
    $AllProducts=product::get();

    return view('website.products',compact('products','AllProducts','characters','party','occasions','subCategories'));


}



/**
 * Show  products by occasion_id
 * @param int $id
 * @return \Illuminate\Contracts\Support\Renderable
 */
public function products_occasion($id){
    $subCategories=subCategory::get();
    $occasions=occasion::get();
    $party=Party_Theme::get();
    $characters=characters::get();
    $products=product::where('occasion_id',$id)->paginate(12);
    $AllProducts=product::get();

    return view('website.products',compact('products','AllProducts','characters','party','occasions','subCategories'));


}




/**
 * Show  products by Party_Theme_id
 * @param int $id
 * @return \Illuminate\Contracts\Support\Renderable
 */
public function products_party_theme($id){
    $subCategories=subCategory::get();
    $occasions=occasion::get();
    $party=Party_Theme::get();
    $characters=characters::get();
    $products=product::where('Party_Theme_id',$id)->paginate(12);
    $AllProducts=product::get();

    return view('website.products',compact('products','AllProducts','characters','party','occasions','subCategories'));


}



/**
 * Show  products by characters_id
 * @param int $id
 * @return \Illuminate\Contracts\Support\Renderable
 */
public function products_characters($id){
    $subCategories=subCategory::get();
    $occasions=occasion::get();
    $party=Party_Theme::get();
    $characters=characters::get();
    $products=product::where('characters_id',$id)->paginate(12);
    $AllProducts=product::get();

    return view('website.products',compact('products','AllProducts','characters','party','occasions','subCategories'));


}







}
