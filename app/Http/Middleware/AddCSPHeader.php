<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AddCSPHeader
{
    public function handle(Request $request, Closure $next)
    {
        // Generate a unique nonce for each request
        $nonce = base64_encode(random_bytes(16));
        \Log::debug("Nonce Generated: {$nonce}");

        // Comprehensive CSP with Report-Only
        $csp = "default-src 'self'; " .
               "script-src 'self' 'nonce-{$nonce}' https://cdn.jsdelivr.net https://code.jquery.com https://cdnjs.cloudflare.com https://stackpath.bootstrapcdn.com https://unpkg.com https://fullcalendar.io https://cdn.datatables.net; " .
               "style-src 'self' 'nonce-{$nonce}' https://fonts.googleapis.com https://cdnjs.cloudflare.com https://cdn.jsdelivr.net https://unpkg.com https://cdn.datatables.net https://code.jquery.com; " .
               "font-src 'self' https://fonts.gstatic.com https://cdnjs.cloudflare.com https://unpkg.com; " .
               "img-src 'self' data:; " .
               "connect-src 'self'; " .
               "frame-src 'self';";

        // Share the nonce with all views
        View::share('nonce', $nonce);

        $response = $next($request);

        \Log::debug("Middleware: Setting CSP Header and Sharing Nonce");
        // Set CSP header in Report-Only mode
        $response->headers->set('Content-Security-Policy-Report-Only', $csp);

        return $response;
    }
}

