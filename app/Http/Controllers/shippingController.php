<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shipping;
use App\city;
use App\country;
/*
|--------------------------------------------------------------------------
| shippingController
|--------------------------------------------------------------------------
| this will handle all shipping part (CRUD) 
|
*/
/*
     _     _             _             
    | |   (_)           (_)            
 ___| |__  _ _ __  _ __  _ _ __   __ _ 
/ __| '_ \| | '_ \| '_ \| | '_ \ / _` |
\__ \ | | | | |_) | |_) | | | | | (_| |
|___/_| |_|_| .__/| .__/|_|_| |_|\__, |
            | |   | |             __/ |
            |_|   |_|            |___/ 

 */


class shippingController extends Controller
{
/**  
* show list of shipping cites and cost
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $shippings=shipping::with('cities')->with('country')->get();
    return view('pages.shipping.list',compact('shippings'));
    }


/**  
* show info of  shipping By id
* @pararm int $id shipping id 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function info($id){

    $shipping=shipping::with('cities')->with('country')->first();
    return view('pages.shipping.info',compact('shipping'));
}   


/**  
    * show  form edit  of  shipping By id 
    * @pararm int $id shipping id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $shipping=shipping::where('id',$id)->first();
        $city=city::with('country')->get();
        $countries=country::get();
        return view('pages.shipping.edit',compact('shipping','city','countries'));
    }    

    /**  
    * save edit  of  shipping By id 
    * @pararm int $id shipping id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){

        $rules=['country_id'=>'required','city_id'=>'required',"cost"=>'required'];

$message=
['country_id.required'=>'يجب ادخال  الدولة     ',
'city_id.required'=>'يجب ادخال  المدينة   ',
'cost.required'=>'يجب ادخال التكلفة    ',

];   
  
        $request->validate($rules,$message);

        $shipping= shipping::where('id',$id)->first();
        $shipping->city_id=$request->city_id;
        $shipping->country_id=$request->country_id;
        $shipping->cost=$request->cost;
        $shipping->save();

        \Notify::success('  يتم تعديل بيانات  الشحن  بنجاح', '   تعديل بيانات      ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  partyTheme 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(){
        $countries=country::get();
        $city=city::get();
        return view('pages.shipping.add',compact('countries','city'));
    }    

    /**  
    * save add  of  partyTheme 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request){

    $rules=['city_id'=>'required|max:255','country_id'=>'required|max:255','cost'=>'required'];
  
  
      $message=[
    'city_id.required'=>'يجب ادخال اسم  المدينة  ',
    'country_id.required'=>'يجب ادخال اسم  الدولة ',
    'cost.required'=>'يجب ادخال   تكلفة الشحن ',

    ];
  
  
        $request->validate($rules,$message);
        $shipping=new shipping;
        $shipping->city_id=$request->city_id;
        $shipping->country_id=$request->country_id;
        $shipping->cost=$request->cost;
        $shipping->save();

        \Notify::success('تم اضافة  شحن  جديد بنجاح', ' اضافة شحن    ');
        return redirect()->back();
    }  

    /**  
    * delete  form     partyTheme 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function delete($id){
        $shipping=shipping::where('id',$id)->delete();
        \Notify::success('تم حذف بنجاح', ' حذف  ل');
        return redirect()->back();
    }   
    
    

    /**  
* shipping   cities 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function shippingCities($id){
    $shipping=shipping::where('country_id',$id)->with('cities')->get();
 
 if($shipping->isEmpty()){
     return response()->json(['code'=>'400',"message" => "now shipping city in this country"]);
   }else{
     return response()->json(['code'=>'200',"data" => $shipping]);
 
   }
 
 }
}
