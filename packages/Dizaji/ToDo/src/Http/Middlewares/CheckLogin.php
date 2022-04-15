<?php

namespace Dizaji\ToDo\Http\Middlewares;


use Closure;
use Dizaji\ToDo\User;
use http\Exception\UnexpectedValueException;

class CheckLogin
{

    public function handle($request, Closure $next)
    {
        if ($request->has('token')) {
            $token = $request->token;
            $user=User::where('token',$token)->first();
            if ($user == null){
                abort(401);
            }
        }
        else{
            abort(401);
        }

        return $next($request);
    }
}
