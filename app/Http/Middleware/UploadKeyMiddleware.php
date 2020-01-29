<?php

namespace App\Http\Middleware;

use Closure;

class UploadKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->header('UPLOAD_KEY') == env('UPLOAD_KEY')) {
            return $next($request);
        }

        return response('Unauthorized.', 401);
    }
}
