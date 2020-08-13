<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ads;
use Carbon\Carbon;
use App\product;
use App\costomerPhoto;
use App\costomerRate;
use App\faq;

/*
|--------------------------------------------------------------------------
| homePageController
|--------------------------------------------------------------------------
| this will handle Home Page part (CRUD)
|
*/
/**
 _                          _____                 
| |                        |  __ \                
| |__   ___  _ __ ___   ___| |__) |_ _  __ _  ___ 
| '_ \ / _ \| '_ ` _ \ / _ \  ___/ _` |/ _` |/ _ \
| | | | (_) | | | | | |  __/ |  | (_| | (_| |  __/
|_| |_|\___/|_| |_| |_|\___|_|   \__,_|\__, |\___|
                                        __/ |     
                                       |___/   
 */
class homePageController extends Controller
{
  /**
     * Show  Home page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
   

        if (\App::isLocale('ar')) {
            //ads ar
            $ads=Ads::where('lang','ar')->where('start_from','<=',Carbon::now())->where('end_at','>=',Carbon::now())->get();
            //costomerRate ar
            $costomerRate=costomerRate::where('lang','ar')->get();
            //costomerPhoto ar
            $costomerPhoto=costomerPhoto::where('lang','ar')->get();
            
        }else{

            //ads en 
            $ads=Ads::where('lang','en')->where('start_from','<=',Carbon::now())->where('end_at','>=',Carbon::now())->get();
            //costomerRate en
            $costomerRate=costomerRate::where('lang','en')->get();
            
            //costomerPhoto en
            $costomerPhoto=costomerPhoto::where('lang','en')->get();
        }
        
        //product
        $topSellingProductParty=product::where('category_id',2)->orderBy('sell_count','desc')->take(8)->get();
        
        $topSellingProductCake=product::where('category_id',1)->orderBy('sell_count','desc')->take(8)->get();   
            

     //viwe

     return view('website.homePage',compact('ads','costomerRate','costomerPhoto','topSellingProductParty','topSellingProductCake'));
    }

    
    public function not_found(){
        return view('website.404');
    }

  /**
     * show list of faq   
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function faq()
    {
        $faqs=faq::get();
        return view('website.faq',\compact('faqs'));
    }


    /**
     * about Us   
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function aboutus()
    {
        return view('website.aboutUs');
    }



    /**
     * contact Us   
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contactus()
    {
        return view('website.contactus');
    }


    /**
     * policy  
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function policy()
    {
        return view('website.policy');
    } 
    
    

    /**
     * deliveryReturns  
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deliveryReturns()
    {
        return view('website.deliveryReturns');
    } 


}
