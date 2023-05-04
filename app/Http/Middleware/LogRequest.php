<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogRequest
{
    public function handle($request, Closure $next)
    {
        $startTime = microtime(true);

        // Обработка запроса
        $response = $next($request);

        dd("hello");
        return $response;
    }
}
