<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Company extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'razao_social','cnpj','endereco','email','telefone','celular','status'
    ];

}
