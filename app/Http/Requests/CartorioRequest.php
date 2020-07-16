<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CartorioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       $documentoUnique = empty($this->cartorio->id) ? '|unique:cartorios' : '|unique:cartorios,documento,'.$this->cartorio->id;

        return [
            'nome' => 'required|max:200',
            'razao' => 'required|max:200',
            'documento' => 'required|max:14' . $documentoUnique,
            'cep' => 'required|digits:8',
            'endereco' => 'required|max:400',
            'bairro' => 'required|max:100',
            'cidade' => 'required|max:100',
            'uf' => 'required|max:2',
            'telefone' => 'nullable|digits_between:8,20',
            'email' => 'max:200',
            'tabeliao' => 'required|max:100'
        ];
    }

}
