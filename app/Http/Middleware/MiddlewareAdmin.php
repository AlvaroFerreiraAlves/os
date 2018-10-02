<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class MiddlewareAdmin
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
        $user  = new User();
        $user = $user->find(auth()->user()->id);
        $typeUser = $user->tipoUsuario;
        foreach ($typeUser as $t){
            $typeUser =  $t->pivot->id_tipo_usuario;
        }

        if($typeUser == 1){

        }else{
           return redirect('/login');
        }
        return $next($request);
    }
}
