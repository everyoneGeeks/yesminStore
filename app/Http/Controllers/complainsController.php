<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complains;

/*
|--------------------------------------------------------------------------
| complainsController
|--------------------------------------------------------------------------
| this will handle all complains part (CRUD) 
|
*/
/***
 *                                _       _           
 *                               | |     (_)          
 *       ___ ___  _ __ ___  _ __ | | __ _ _ _ __  ___ 
 *      / __/ _ \| '_ ` _ \| '_ \| |/ _` | | '_ \/ __|
 *     | (_| (_) | | | | | | |_) | | (_| | | | | \__ \
 *      \___\___/|_| |_| |_| .__/|_|\__,_|_|_| |_|___/
 *                         | |                        
 *                         |_|                        
 */
class complainsController extends Controller
{
/**  
* show list of Complains
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $Complains=Complains::with('user')->get();
    

    return view('pages.Complain.list',compact('Complains'));
    }
    /**  
    * show info of  Complain By id
    * @pararm int $id Complain id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $Complain=Complains::where('id',$id)->with('provider')->with('user')->first();
        return view('pages.Complain.info',compact('Complain'));
    }
}
