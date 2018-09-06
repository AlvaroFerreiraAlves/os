<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;


class CustomerValidator extends LaravelValidator
{


    public $rules_cpf = [
        'nome' => 'required|string|max:255',
        'telefone' => '(77)9999-3333',
        'telefone' => 'required|celular_com_ddd',
        'celular' => '(77)99999-3333',
        'celular' => 'required|celular_com_ddd',
        'cnpj_cpf' => 'required|cpf|unique:customers',
    ];

    public $rules_cnpj = [
        'nome' => 'required|string|max:255',
        'telefone' => '(77)9999-3333',
        'telefone' => 'required|celular_com_ddd',
        'celular' => '(77)99999-3333',
        'celular' => 'required|celular_com_ddd',
        'cnpj_cpf' => 'required|cnpj|unique:customers',
    ];

    public function rulesCpfUpdate($id)
    {
        return [
            'nome' => 'required|string|max:255',
            'telefone' => '(77)9999-3333',
            'telefone' => 'required|celular_com_ddd',
            'celular' => '(77)99999-3333',
            'celular' => 'required|celular_com_ddd',
            'cnpj_cpf' => 'required|cpf|unique:customers,cnpj_cpf,'.$id,
        ];
    }

    public function rulesCnpjUpdate($id)
    {
        return [
            'nome' => 'required|string|max:255',
            'telefone' => '(77)9999-3333',
            'telefone' => 'required|celular_com_ddd',
            'celular' => '(77)99999-3333',
            'celular' => 'required|celular_com_ddd',
            'cnpj_cpf' => 'required|cnpj|unique:customers,cnpj_cpf,'.$id,
        ];
    }


}
