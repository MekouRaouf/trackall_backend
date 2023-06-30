<?php

namespace App\Http\Middleware;

use App\Models\Apikey;
use Closure;
use Illuminate\Http\Request;

class CheckApiKeyOnRequest
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
        if($key = $request->api_key){
            if(!Apikey::where('value', $key)->first()){
                return response()->json(['message' => 'UnAuthorized. API key doesn\'t exist'], 401);
            }
        }

        if(!$key = $request->api_key){
            return response()->json(['message' => 'UnAuthorized. No API key found'], 401); 
        }

        return $next($request);
    }
}
