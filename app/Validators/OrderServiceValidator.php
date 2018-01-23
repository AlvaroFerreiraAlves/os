<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class OrderServiceValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'dt_prox_manut'=>'required',
        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];
}
