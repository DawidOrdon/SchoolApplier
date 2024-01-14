<?php

namespace App\Http\Middleware;

use App\Models\Kids;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class KidOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $kid=Kids::all()
            ->where('id','=',$request->route('kid'))
            ->where('user_id','=',Auth::user()->id);
        if (count($kid)) {
            return $next($request);
        }
        return redirect('/schools');
    }
}
