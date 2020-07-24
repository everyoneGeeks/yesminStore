<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\orderCancel;
use App\orderPrduct;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| ordersController
|--------------------------------------------------------------------------
| this will handle all orders part (R)
|
*/
/**
 *                    _
 *                   | |
 *       ___  _ __ __| | ___ _ __ ___
 *      / _ \| '__/ _` |/ _ \ '__/ __|
 *     | (_) | | | (_| |  __/ |  \__ \
 *      \___/|_|  \__,_|\___|_|  |___/
 *
 *
 */
class ordersController extends Controller
{
/**
* show list of category
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $orders=Orders::with('user')->with('orderProduct')->get();
    return view('pages.order.list',compact('orders'));
    }
    /**
    * show info of  order By id
    * @pararm int $id order id
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $order=Orders::where('id',$id)->with('user')->with('orderCancel')->with('orderProduct')->first();
        return view('pages.order.info',compact('order'));
    }
    /**
    * change status of category (active / deactive)
    * @pararm int $id category id
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function status($id){
        $category=category::where('id',$id)->first();

        if($category->is_active == 0){
            $category->is_active = 1;
            $category->save();
            \Notify::success('تم تفعيل القسم بنجاح', 'تغير حالة القسم  ');
        }else{
            $category->is_active = 0;
            $category->save();
            \Notify::success('تم الغاء تفعيل القسم بنجاح', 'تغير حالة القسم ');
        }

        return redirect()->back();
    }



}
