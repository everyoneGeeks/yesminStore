<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
 * @param object $object_table object model 
 * @param string  $cloName name of colum 
 * @param string $fileName the name of file 
 * @param string $path the path to save file  
 */
public function SaveFile($object_table,$cloName,$fileName,$path){
    if(request()->hasFile($fileName))
		{
	
			$file = request()->file($fileName);
			$filename = \Str::random(6).'_'.time().'.'.$file->getClientOriginalExtension();
			$file->move($path,$filename);
		
			$object_table->$cloName ="/".$path.'/'.$filename;
		}
  }




	
}
