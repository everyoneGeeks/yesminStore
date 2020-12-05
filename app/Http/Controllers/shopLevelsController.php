<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\beautyCenterLevels;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| shopLevelsController
|--------------------------------------------------------------------------
| this will handle all shop levels part (CRUD) 
|
*/
/**
      _                 _                _     
     | |               | |              | |    
  ___| |__   ___  _ __ | | _____   _____| |___ 
 / __| '_ \ / _ \| '_ \| |/ _ \ \ / / _ \ / __|
 \__ \ | | | (_) | |_) | |  __/\ V /  __/ \__ \
 |___/_| |_|\___/| .__/|_|\___| \_/ \___|_|___/
                 | |                           
                 |_|                     
 */
class shopLevelsController extends Controller
{

    /**  
    * show list of shop Levels
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function list(){
        $shopLevels=beautyCenterLevels::get();
        return view('pages.shopLevels.list',compact('shopLevels'));
        }
        /**  
        * show info of  shop levels By id
        * @pararm int $id shop levels id 
        * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
        * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
        */
        public function info($id){
            $shopLevel=beautyCenterLevels::where('id',$id)->first();
            return view('pages.shopLevels.info',compact('shopLevel'));
        }
        /**  
        * change status of shop levels (active / deactive)
        * @pararm int $id shop levels id 
        * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
        * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
        */
        public function status($id){
            $shopLevels=beautyCenterLevels::where('id',$id)->first();
        
            if($shopLevels->is_active == 0){
                $shopLevels->is_active = 1;
                $shopLevels->save();
                \Notify::success('تم تفعيل مستوي المتجر بنجاح', 'تغير حالة مستوي المتجر  ');
            }else{
                $shopLevels->is_active = 0;
                $shopLevels->save();
                \Notify::success('تم الغاء تفعيل مستوي المتجر بنجاح', 'تغير حالة مستوي المتجر ');
            }
        
            return redirect()->back();
        }
    
        /**  
        * show  form edit  of  shop levels By id 
        * @pararm int $id shop levels  id 
        * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
        * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
        */
        public function formEdit($id){
            $shopLevel=beautyCenterLevels::where('id',$id)->first();
            return view('pages.shopLevels.edit',compact('shopLevel'));
        }    
    
        /**  
        * save edit  of  shop levels By id 
        * @pararm int $id shop levels id 
        * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
        * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
        */
        public function submitEdit(Request $request,$id){
    
            $rules=['level_ar'=>'required|max:255','level_en'=>'required|max:255'];
$message=[
    'level_ar.required'=>'يجب ادخال اسم مستوي المتجر ',
    'level_en.required'=>'يجب ادخال اسم مستوي المتجر',
    "level_ar.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
    "level_en.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ", 
    ];
            $request->validate($rules,$message);

            $shopLevels=beautyCenterLevels::where('id',$id)->first();
            $shopLevels->level_ar=$request->level_ar;
            $shopLevels->level_en=$request->level_en;
            $shopLevels->is_active=$request->active ? $request->active : 0;
            $shopLevels->created_at=Carbon::now();
            $shopLevels->save();
    
            \Notify::success('تم تعديل بيانات مستوي المتجر بنجاح', ' تعديل بيانات مستوي المتجر');
            return redirect()->back();
        }  
    
    
        /**  
        * show  form add  of  shop levels 
        * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
        * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
        */
        public function formAdd(){
            return view('pages.shopLevels.add');
        }    
    
        /**  
        * save add  of  shop levels 
        * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
        * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
        */
        public function submitAdd(Request $request){
    
            $rules=['level_ar'=>'required|max:255','level_en'=>'required|max:255'];
            $message=[
            'level_ar.required'=>'يجب ادخال اسم مستوي المتجر ',
            'level_en.required'=>'يجب ادخال اسم مستوي المتجر',
            "level_ar.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
            "level_en.max"=>"يجب لا يزيد عدد الاحرف عن 255 حرف ",
            ];
            $request->validate($rules,$message);
        
            $shopLevels=new beautyCenterLevels;
            $shopLevels->level_ar=$request->level_ar;
            $shopLevels->level_en=$request->level_en;
            $shopLevels->is_active=$request->active ? $request->active : 0;
            $shopLevels->created_at=Carbon::now();
            $shopLevels->save();
    
            \Notify::success('تم اضافة مستوي  المتجر بنجاح', ' اضافة  مستوي المتجر   ');
            return redirect()->back();
        }  
    
    
        
    }
