<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cep' => 'required',
            'logradouro' => 'required',
            'complemento' => '',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required'
        ];
    }
}
