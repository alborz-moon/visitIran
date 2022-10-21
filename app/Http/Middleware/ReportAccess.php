<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReportAccess
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
        $user = $request->user();

        if($user == null || 
            (
                $user->level != User::$ADMIN_LEVEL &&
                $user->level != User::$EDITOR_LEVEL &&
                $user->level != User::$FINANCE_LEVEL &&
                $user->level != User::$REPORT_LEVEL
            )
        )
            return Redirect::route('403');
        
        if($request->getHost() == 'localshop.com' && 
            $user->access != User::$ACCESS_BOTH &&
            $user->access != User::$ACCESS_SHOP
        )
            return Redirect::route('403');
            
        if($request->getHost() == 'localevent.com' && 
            $user->access != User::$ACCESS_BOTH &&
            $user->access != User::$ACCESS_EVENT
        )
            return Redirect::route('403');

        return $next($request);
    }
}
