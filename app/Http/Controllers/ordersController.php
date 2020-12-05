<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\orderCancel;
use App\orderPrduct;
use Carbon\Carbon;
use App\Complains;
use App\returnOrder;

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
    $orders=Orders::with('user')->with(['orderProduct'=>function($q){
        $q->where('is_returning','0')->get();
    }])->get();
    return view('pages.order.list',compact('orders'));
    }

/**
* show accept Orders
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function acceptOrders(){
    $orders=Orders::with('user')->with(['orderProduct'=>function($q){
        $q->where('is_returning','0')->get();
    }])->where('status','inprogress')->get();
    return view('pages.order.Acceptlist',compact('orders'));
    }
    
    
    
    
    
    
/**
* show done of orders
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function done(){
    $orders=Orders::with('user')->with(['orderProduct'=>function($q){
        $q->where('is_returning','0')->get();
    }])->where('status','delivered')->get();
    return view('pages.order.Done',compact('orders'));
    }
    
    
/**
* show cancel of category
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function cancelOrders(){
    $orders=Orders::with('user')->with(['orderProduct'=>function($q){
        $q->where('is_returning','0')->get();
    }])->where('status','cancel')->get();
    return view('pages.order.Cancel',compact('orders'));
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
* show complain  Orders
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function ComplainOrders(){
    $orders=Complains::get();
    return view('pages.order.ComplainOrders',compact('orders'));
    }
    
    
    /**
* show complain  Orders
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function returnOrder (){
    $orders=returnOrder::get();
    return view('pages.order.returnOrder',compact('orders'));
    }
    
    
    
     
    /**
    * accept order
    * @pararm int $id order id
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function accept($id){
        $order=Orders::where('id',$id)->first();

        $order->status="inprogress";
        $order->save();
        \Notify::success('تم  الموافقة علي الطلب رقم   ', 'تم الموافقة بنجاح    '.$order->order_id);

        return redirect()->back();
    }



        /**
    * delivered order
    * @pararm int $id order id
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function delivered($id){
        $order=Orders::where('id',$id)->first();

        $order->status="delivered";
        $order->save();
        \Notify::success('تم  توصيل   الطلب رقم   ', 'تم التوصيل  بنجاح    '.$order->order_id);

        return redirect()->back();
    }


        /**
    * cancel order
    * @pararm int $id order id
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function cancel($id){
        $order=Orders::where('id',$id)->first();

        $order->status="cancel";
        $order->save();
        \Notify::success('تم الغاء الموافقة علي الطلب رقم   ', 'تم  الغاء الطلب     '.$order->order_id);

        return redirect()->back();
    }




    /**  
    * show info of  Complain By id
    * @pararm int $id Complain id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function returnOrderinfo($id){
        $Complains=returnOrder::where('id',$id)->with('order')->with('user')->first();
        return view('pages.order.ReturnOrderInfo',compact('Complains'));
    }




}
