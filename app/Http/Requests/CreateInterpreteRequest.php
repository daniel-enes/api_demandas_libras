<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInterpreteRequest extends FormRequest
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
            'data.type' => 'required|in:interpretes',
            'data.attributes' => 'required|array',
            'data.attributes.nome' => 'required|string',
            'data.attributes.telefone' => 'required|integer',
            'data.attributes.email' => 'required|email|unique:App\Models\Interprete,email',
            'data.attributes.status' => 'required|string',
        ];
    }
}
