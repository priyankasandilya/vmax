<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use Illuminate\Http\Request;

class CustomAuth
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
        $path = $request->path();
        if(($path=='/' || $path=='signup') && (Session::get('loggeduser')))
        {
            return redirect('studentlist');
        }
        else if($path!='/' && !Session::get('loggeduser') && $path!='signup' ) {
            return redirect('/');
        }
        
        return $next($request);
    }
}
