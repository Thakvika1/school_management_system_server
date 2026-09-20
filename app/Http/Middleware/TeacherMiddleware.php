<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class TeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = Auth::user()->role;

        if (!$role || $role !== 'admin' && $role !== 'teacher') {
            return response()->json([
                'message' => 'Unauthorized. Admin and Teacher access only.'
            ], 403);
        }

        return $next($request);
    }
}
