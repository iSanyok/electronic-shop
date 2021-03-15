<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class Admin
{
    /**
     * Обрабатывает входящий запрос
     * и проверяет является ли пользователь админом
     *
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next): mixed
    {
        if (Auth::check() && Gate::allows('admin')) {
            return $next($request);
        }
        return redirect(route('index'));
    }
}
