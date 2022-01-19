<?php

namespace App\Http\Middleware;

use App\Models\Redirect;
use Closure;
use Illuminate\Http\Request;

class RedirectFromOldSlug
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
        $url = parse_url($request->url(), PHP_URL_PATH);

        $redirect_next = Redirect::query()
            ->where('old_slug', $url)
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->first();
        $redirect_last = null;

        while ($redirect_next !== null) {
            $redirect_last = $redirect_next;
            $redirect_next = Redirect::query()
                ->where('old_slug', $redirect_last->new_slug)
                ->orderByDesc('created_at')
                ->orderByDesc('id')
                ->first();
        }
        if ($redirect_last !== null) {
            return redirect($redirect_last->new_slug);
        }


        return $next($request);
    }
}
