<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/*
|--------------------------------------------------------------------------
| UserController
|--------------------------------------------------------------------------
| this will handle add , edit , update   user part (CRUD)
|
*/
/**
 _    _               
| |  | |              
| |  | |___  ___ _ __ 
| |  | / __|/ _ \ '__|
| |__| \__ \  __/ |   
 \____/|___/\___|_|   
                     
 */
class UserController extends Controller
{
/**  
* show info of  user By id
* @pararm int $id user id 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function info($id){
    $user=Users::where('id',$id)->first();
    return view('pages.users.info',compact('user'));
}



/**  
* show info of  user By id
* @pararm int $id user id 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function editForm($id){
    $user=Users::where('id',$id)->first();
    return view('pages.users.info',compact('user'));
}






/**  
* show info of  user By id
* @pararm int $id user id 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function editSubmit($id){
    $user=Users::where('id',$id)->first();
    return view('pages.users.info',compact('user'));
}


}
