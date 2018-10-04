<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class OrderServiceValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'dt_prox_manut'=>'required',
            'equipamento'=>'required',
            'n_serie'=>'required',
            'p_info'=>'required',
            'p_const'=>'required',
            's_exec'=>'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'dt_prox_manut'=>'required',
            'equipamento'=>'required',
            'n_serie'=>'required',
            'p_info'=>'required',
            'p_const'=>'required',
            's_exec'=>'required',
        ],
   ];
}
