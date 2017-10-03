<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CustomerValidator extends LaravelValidator
{

    public $rules = [
        'cnpj_cpf' => 'cpf'
   ];


    public $rulesCnpj = [
        'cnpj_cpf' => 'cnpj'
    ];


}
