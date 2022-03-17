<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DefineLanguage
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
        $locale = $request->query("lang", "en");        
        
        if (!in_array($locale, ["en", "pt_BR"])) {
            $message = __("messages.unsupported_lang");

            return response()->json(["error" => $message], 400);
        }
    
        App::setlocale($locale);

        return $next($request);
    }
}
