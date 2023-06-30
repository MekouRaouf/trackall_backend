<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserApiKey
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

        // Redirect to parameter page if user has not generated an API KEY
        if(Auth::check() && Auth::user()){
            $user = User::where('name', Auth::user()->name)
                    ->where('email', Auth::user()->email)
                    ->first();

            $api_key = $user->api_keys()->orderBy('id', 'DESC')->first();

            if(!$api_key){
                return redirect()->route('page.parameters')->with('message', 'You must generate an API key to access to your dashboard');
            }
        }

        return $next($request);
    }
}
