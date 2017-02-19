<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class RouteNeedsRole.
 */
class RouteNeedsPermission
{
    /**
     * @param  $request
     * @param callable $next
     * @param  $permission
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (!access()->can($permission)) {
            return redirect('/')->withFlashDanger('You do not have access  ('.$permission.')  to do that.');
        }

        return $next($request);
    }
}
