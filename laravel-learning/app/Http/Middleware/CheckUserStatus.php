<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Get Authenticated User
        $user = $request->user();

        //Check User authentication
        if(!$user){
            return response()->json([
                'success'=>false,
                'message'=>'Unauthorized access'
            ], 401);
        }

        //Check User Status
        if($user->status !== 'active'){
            return response()->json([
                'success'=>false,
                'message'=> 'Your accout is inactive'
            ], 403);
        }
        
        //continue to the controller
        return $next($request);
    }
}
