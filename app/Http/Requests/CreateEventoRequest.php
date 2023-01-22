<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventoRequest extends FormRequest
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
            'data.type' => 'required|in:eventos',
            'data.attributes' => 'required|array',
            'data.attributes.titulo' => 'required|string',
            'data.attributes.sobre' => 'required|string',
            'data.attributes.informacoes' => 'nullable|url',
            'data.relationships' => 'required|array',
            'data.relationships.responsaveis' => 'required|array',
            'data.relationships.responsaveis.data' => 'required|array',
            'data.relationships.responsaveis.data.type' => 'required|in:responsaveis',
            'data.relationships.responsaveis.data.id' => 'required|string'
        ];
    }
}
