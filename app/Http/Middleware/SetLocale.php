<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = session('locale')
            ?? $request->cookie('filament_language_switch_locale')
            ?? config('app.locale');

        // Ensure it's a valid locale (optional)
        if (!in_array($locale, ['en', 'de'])) {
            $locale = 'en';
        }

        // Set Laravel's app locale for this request
        App::setLocale($locale);

        return $next($request);
    }
}
