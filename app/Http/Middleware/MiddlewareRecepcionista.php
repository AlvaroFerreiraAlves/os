<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class MiddlewareRecepcionista
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
            if($typeUser == 2 || $typeUser == 1){
                session('MiddlewareRecepcionista', true);
                break;
            }else{
                return redirect('/');
            }
        }
        return $next($request);
    }
}
