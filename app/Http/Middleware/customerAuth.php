<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class customerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      echo $path=$request->path();
        
      
        if($path!='customer'){
            return redirect("/customer");
        }else{
            // return redirect("/customer")
        }
        // if(Auth::check()){
        //     echo $path=$request->path();
        // }else{      
        //     echo "mnot";
        // }
        return $next($request);
    }
}
