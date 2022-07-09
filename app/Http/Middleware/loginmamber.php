<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\App_User;

class loginmamber
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $req, Closure $next)
    {
    $user = App_User::where([
            'email'=> $req->input('email'),
            'password' => $req->input('password')
        ])->first();
    
    if (!$user) {
       return response()->view('loginmamber');
    }
    
        return $next($req);
    }
}
