<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TypeAdmin
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
      
            if($request->session()->get('type') == '1')
            {
                return $next($request);
            }
            else{
                return redirect("/");
            }
    
        
    }
}
