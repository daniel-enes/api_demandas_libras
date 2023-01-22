<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateResponsavelRequest extends FormRequest
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
        return [
            'data' => 'required|array',
            'data.type' => 'required|in:responsaveis',
            'data.attributes' => 'required|array',
            'data.attributes.nome' => 'required|string',
            'data.attributes.telefone' => 'required|integer',
            'data.attributes.email' => 'required|email|unique:App\Models\Responsavel,email',
            'data.attributes.ocupacao' => 'required|string',
            'data.attributes.cpf' => 'required|integer',
            'data.attributes.registro' => 'nullable|integer'
        ];
    }
}
