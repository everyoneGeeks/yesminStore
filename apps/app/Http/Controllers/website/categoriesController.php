<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;
use Carbon\Carbon;
use App\subCategory;
/*
|--------------------------------------------------------------------------
| categoriesController
|--------------------------------------------------------------------------
| this will handle all category user part (CRUD) 
|
*/
/**
            _                              
           | |                             
   ___ __ _| |_ ___  __ _  ___  _ __ _   _ 
  / __/ _` | __/ _ \/ _` |/ _ \| '__| | | |
 | (_| (_| | ||  __/ (_| | (_) | |  | |_| |
  \___\__,_|\__\___|\__, |\___/|_|   \__, |
                     __/ |            __/ |
                    |___/            |___/ 
 */
class categoriesController extends Controller
{
    
      /**
     * Show  subCategories page
     * @param int $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function subCategories($id){
        $subCategories=subCategory::where('category_id',$id)->get();
        return view('website.subCategories',compact('subCategories'));
    }

}
