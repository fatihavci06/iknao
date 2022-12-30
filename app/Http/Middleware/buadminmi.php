<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class buadminmi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::guard('yonetim')->check() && Auth::guard('yonetim')->user()->rol!=0){ //yoneticimi databasede user tablosunda tanımlı eğer true ise çalışır
            return $next($request); //devam et demek

        }
        else{
            return redirect()->route('back.giris')->with(['false'=>'Hatalı']);
        }
    }
}
