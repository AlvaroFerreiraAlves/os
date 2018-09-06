<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ItemValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'nome'=>'required|string|max:80',
            'descricao'=>'required|string|max:255',
            'valor'=>'required',
            
        ],
        ValidatorInterface::RULE_UPDATE => [
            'nome'=>'required|string|max:80',
            'descricao'=>'required|string|max:255',
            'valor'=>'required',
        ],
    ];
}
