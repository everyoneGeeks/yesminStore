<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Codes;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| codeController
|--------------------------------------------------------------------------
| this will handle all codeController part (CRUD) 
|
*/
/**
               _           
              | |          
  ___ ___   __| | ___  ___ 
 / __/ _ \ / _` |/ _ \/ __|
| (_| (_) | (_| |  __/\__ \
 \___\___/ \__,_|\___||___/
                           
 */
class codeController extends Controller
{
/**  
* show list of codes
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $codes=Codes::get();
    return view('pages.codes.list',compact('codes'));
    }
    /**  
    * change status of code (active / deactive)
    * @pararm int $code ad id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function status($id){
        $code=Codes::where('id',$id)->first();
    
        if($code->is_active == 0){
            $code->is_active = 1;
            $code->save();
            \Notify::success('تم تفعيل  الكود بنجاح', 'تغير حالة  الكود  ');
        }else{
            $code->is_active = 0;
            $code->save();
            \Notify::success('تم الغاء تفعيل  الكود بنجاح', 'تغير حالة الكود ');
        }
    
        return redirect()->back();
    }

    /**  
    * show  form edit  of  code By id 
    * @pararm int $id code id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $code=Codes::where('id',$id)->first();
        return view('pages.codes.edit',compact('code'));
    }    

    /**  
    * save edit  of  code By id 
    * @pararm int $id code id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){

            $rules=[
            'end_date'=>'required|date',
            "code"=>'required|unique:discount_code,code,'.$id,
            "discount"=>"required",
            'count'=>'required',
        ];
        $message=['count.required'=>'يجب ادخال عدد مرات استخدام الكود ','discount.required'=>'يجب ادخال الخصم ','code.required'=>'يجب ادخال  الكود ','code.unique'=>'هذا الكود :input موجود من قبل ','end_date.required'=>'يجب ادخال  التاريخ'];
        $request->validate($rules,$message);

        $Code=Codes::where('id',$id)->first();
        $Code->end_date=$request->end_date;
        $Code->code=$request->code;
        $Code->discount=$request->discount;
        $Code->count=$request->count;
        $Code->is_active=$request->active ? $request->active : 0;
        $Code->created_at=Carbon::now();
        $Code->save();

        \Notify::success('تم تعديل بيانات  الكود بنجاح', ' تعديل بيانات  الكود   ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  code 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(){
        return view('pages.codes.add');
    }    

    /**  
    * save add  of  code 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request){
        $rules=[
            'end_date'=>'required|date',
            "code"=>'required|unique:discount_code,code',
            "discount"=>"required",
            'count'=>'required',
        ];
        $message=['count.required'=>'يجب ادخال عدد مرات استخدام الكود ','discount.required'=>'يجب ادخال الخصم ','code.required'=>'يجب ادخال  الكود ','code.unique'=>'هذا الكود :input موجود من قبل ','end_date.required'=>'يجب ادخال  التاريخ'];
        $request->validate($rules,$message);



        $Code=new Codes;
        $Code->end_date=$request->end_date;
        $Code->code=$request->code;
        $Code->discount=$request->discount;
        $Code->count=$request->count;
        $Code->is_active=$request->active ? $request->active : 0;
        $Code->created_at=Carbon::now();
        $Code->save();
        \Notify::success('تم اضافة بيانات كود الخصم بنجاح', 'اضافة بيانات  كود الخصم');

        return redirect()->back();
    } 
}
