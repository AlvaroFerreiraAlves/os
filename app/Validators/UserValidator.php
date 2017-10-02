<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|string|max:255',
            'telefone' => '(77)99999-3333',
            'telefone' => 'required|celular_com_ddd',
            'cpf' => 'required|cpf|unique:users',
        ],
   ];
}
