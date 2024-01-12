<?php

namespace App\Http\Middleware;

use App\Models\schools;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SchoolOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $school=schools::all()->where('user_id','=',Auth::user()->id)->where('id','=',$request->route('school'));

        if (count($school)) {
            return $next($request);
        }
        return redirect('/schools');
    }
}
