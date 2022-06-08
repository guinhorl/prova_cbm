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
            'ibge' => 'nullable',
            'cep' => 'required',
            'logradouro' => 'required',
            'complemento' => 'nullable',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required'
        ];
    }
}
