<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Hexadog\ThemesManager\Facades\ThemesManager;

class Themes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
public function handle(Request $request, Closure $next, $theme = null): Response
{
    if ($request->segment(1) === 'app' || $request->segment(1) === 'admin' || $request->segment(1) === 'payment')
    {
        $theme = 'app/pico';
    }
    else
    {
        $theme = 'guest/' . get_option('frontend_theme', env('THEME_FRONTEND'));
    }

    // --- THIS IS THE CORRECT FIX ---
    // --- هذا هو الإصلاح الصحيح ---
    try {
        ThemesManager::set($theme);
    } catch (\Exception $e) {
        // Ignore any error, since themes are already built.
    }

    app()->instance('theme', $theme);

    return $next($request, $theme);
}
}
