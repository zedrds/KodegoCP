<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {


        if (!$request->user()) {
            return redirect()->route('home');
        }
    
        $allowedRoles = ['admin', 'user'];
        if (!in_array($role, $allowedRoles)) {

            return response()->view('errors.403', [], 403);
        }

        $userRole = $request->user()->role;
        if($userRole !== $role){          
            switch ($userRole) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                    break;
                case 'user':
                    return redirect()->route('guest.profile');
                    break;
                default:
                    return redirect('home');
                    break;
            }

        }
        return $next($request);
    }
}
