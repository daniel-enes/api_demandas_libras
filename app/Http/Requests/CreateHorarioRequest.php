<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHorarioRequest extends FormRequest
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
            'data.type' => 'required|in:horarios',
            'data.attributes' => 'required|array',
            'data.attributes.modalidade' => 'required|string',
            'data.attributes.dia' => 'required|date',
            'data.attributes.inicia' => 'required|string',
            'data.attributes.termina' => 'required|string',
            'data.attributes.local' => 'nullable|string',
            'data.attributes.material' => 'nullable|url',
            'data.attributes.agenda' => 'required|string',
            'data.attributes.observacoes' => 'nullable|string',
            'data.relationships' => 'required|array',
            'data.relationships.eventos' => 'required|array',
            'data.relationships.eventos.data' => 'required|array',
            'data.relationships.eventos.data.type' => 'required|in:eventos',
            'data.relationships.eventos.data.id' => 'required|string'
        ];
    }
}
