<?php

namespace App\Http\Middleware;

use App\Models\Classes;
use App\Models\schools;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ClassOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $class=Classes::join('schools','schools.id','=','classes.school_id')
            ->get(['schools.id as s_id','classes.id as c_id','schools.user_id as u_id'])
            ->where('s_id','=',$request->route('school'))
            ->where('c_id','=',$request->route('class'))
            ->where('u_id','=',Auth::user()->id);
        if (count($class)) {
            return $next($request);
        }
        return redirect('/schools');
    }
}
