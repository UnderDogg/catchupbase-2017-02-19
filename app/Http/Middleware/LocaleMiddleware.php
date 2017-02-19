<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class LocaleMiddleware.
 */
class LocaleMiddleware
{
    /**
     * @var array
     */
    protected $languages = ['en', 'am'];

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('locale') && in_array(session()->get('locale'), $this->languages)) {
            app()->setLocale(session()->get('locale'));
        }

        return $next($request);
    }
}
