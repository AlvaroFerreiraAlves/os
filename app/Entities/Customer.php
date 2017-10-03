<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Customer extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome','tipo_cliente','cnpj_cpf','ie','endereco','cep','telefone','celular','status'
    ];


}
