<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\costomerRate;
use Carbon\Carbon;

class costomerRateController extends Controller
{
/**  
* show list of costomerRate
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $costomerRate=costomerRate::get();
    return view('pages.costomerRate.list',compact('costomerRate'));
    }


    /**  
    * show  form edit  of  ad By id 
    * @pararm int $id ad id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $ad=costomerRate::where('id',$id)->first();
        return view('pages.costomerRate.edit',compact('ad'));
    }    

    /**  
    * save edit  of  ad By id 
    * @pararm int $id ad id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){

            $rules=[
                "lang"=>'in:ar,en',
        ];
        
        $message=[ 
        'lang.in'=>'   يجب ان تكون اللغه المدخلة مابين  ar او en  ',];
        $request->validate($rules,$message);

        $ad=costomerRate::where('id',$id)->first();
        $ad->lang=$request->lang;

        if($request->hasFile('image')){
            $this->SaveFile($ad,'image','image','upload/costomerRate');
        }

        $ad->created_at=Carbon::now();
        $ad->save();

        \Notify::success('تم تعديل بيانات  3 بنجاح', ' تعديل بيانات  3   ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  ad 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(){
        return view('pages.costomerRate.add');
    }    

    /**  
    * save add  of  ad 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request){
        $rules=[
            'image'=>'required',
            "lang"=>'required|in:ar,en',
   
        ];
        $message=[
        'image.required'=>'يجب ادخال  الصورة ',
        'lang.required'=>'يجب ادخال  اللغة  ',
        'lang.in'=>'   يجب ان تكون اللغه المدخلة مابين  ar او en  ',

        
        ];
        $request->validate($rules,$message);



        $ad=new costomerRate;
        $ad->lang=$request->lang;

        if($request->hasFile('image')){
            $this->SaveFile($ad,'image','image','upload/costomerRate');
        }
        $ad->created_at=Carbon::now();
        $ad->save();
        
        \Notify::success('تم اضافة بيانات 3 بنجاح', 'اضافة بيانات  3');

        return redirect()->back();
    } 
    
    
        
   /**  
    * delete add by id
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    
    public function delete($id){
        $Ads=costomerRate::where('id',$id)->delete();
                
        \Notify::success('تم حذف   بنجاح', 'حذف بيانات  ');

        return redirect()->back();
    }
}
