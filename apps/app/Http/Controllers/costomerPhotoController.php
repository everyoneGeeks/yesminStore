<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\costomerPhoto;
use Carbon\Carbon;
class costomerPhotoController extends Controller
{
/**  
* show list of costomerPhoto
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $costomerPhoto=costomerPhoto::get();
    return view('pages.costomerPhoto.list',compact('costomerPhoto'));
    }
    /**  
    * change status of costomerPhoto (active / deactive)
    * @pararm int $id ad id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */

    /**  
    * show  form edit  of  ad By id 
    * @pararm int $id ad id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $ad=costomerPhoto::where('id',$id)->first();
        return view('pages.costomerPhoto.edit',compact('ad'));
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

        $ad=costomerPhoto::where('id',$id)->first();

        $ad->lang=$request->lang;

        if($request->hasFile('image')){
            $this->SaveFile($ad,'image','image','upload/costomerPhoto');
        }

        $ad->created_at=Carbon::now();
        $ad->save();

        \Notify::success('تم تعديل بيانات  2 بنجاح', ' تعديل بيانات  2   ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  ad 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(){
        return view('pages.costomerPhoto.add');
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



        $ad=new costomerPhoto;
        $ad->lang=$request->lang;

        if($request->hasFile('image')){
            $this->SaveFile($ad,'image','image','upload/costomerPhoto');
        }
        $ad->created_at=Carbon::now();
        $ad->save();
        
        \Notify::success('تم اضافة بيانات 2 بنجاح', 'اضافة بيانات  2');

        return redirect()->back();
    } 
    
        
   /**  
    * delete add by id
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    
    public function delete($id){
        $Ads=costomerPhoto::where('id',$id)->delete();
                
        \Notify::success('تم حذف   بنجاح', 'حذف بيانات  ');

        return redirect()->back();
    }
}
