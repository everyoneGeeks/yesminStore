<?php

namespace App\Http\Middleware;
use App\websiteSetting;
use Closure;

class close
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if(\App\websiteSetting::find(1)->Close =='no'){
           return redirect()->to(route('homePage'));
       }else{
               return $next($request);
       }
        

        
    }
}
