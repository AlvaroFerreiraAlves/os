<?php

namespace App;

use App\Entities\UserType;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','cpf', 'email', 'password','endereco','telefone','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tipoUsuario(){
        return $this->belongsToMany(UserType::class, 'user_type_users', 'id_usuario', 'id_tipo_usuario');
    }
}
