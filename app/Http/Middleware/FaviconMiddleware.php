<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FaviconMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($response instanceof \Illuminate\Http\Response && str_contains($response->headers->get('Content-Type'), 'text/html')) {
            $html = $response->getContent();
            $favicon = '
                <link rel="apple-touch-icon" href="'.asset('images/logo2.png').'">
                <link rel="icon" type="image/png" sizes="32x32" href="'.asset('images/logo2.png').'">
                <link rel="icon" type="image/png" sizes="16x16" href="'.asset('images/logo2.png').'">
            ';

            $html = str_replace('</head>', $favicon.'</head>', $html);
            $response->setContent($html);
        }

        return $response;
    }

}
