<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class CheckRole
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
        $users = User::where('username',$request->username)->first();
        if ($users->status == 'admin') {
            return redirect('admin/dashboard');
        } elseif ($users->status == 'mahasiswa') {
            return redirect('mahasiswa/dashboard');
        }
        return $next($request);
    }
}
