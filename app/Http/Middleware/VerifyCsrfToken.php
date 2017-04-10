<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
    public function handle($request, Closure $next)
    {
        // 如果是未登录用户的话，关闭 CSRF 认证
        // if (!Auth::check()) {
            return $next($request);
        // }
        // return parent::handle($request, $next);
    }
}
