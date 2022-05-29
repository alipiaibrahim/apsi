<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsDosen
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->roles_id == 3){
            return $next($request);
        }
        return redirect('home')
            ->with('error', 'Anda tidak memiliki akses sebagai Dosen');
    }
}
