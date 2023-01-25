<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\EventosIdentifierResource;

class ResponsaveisResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => (string) $this->id,
            'type' => 'responsaveis',
            'attributes' => [
                'nome' => $this->nome,
                'telefone' => $this->telefone,
                'email' => $this->email,
                'ocupacao' => $this->ocupacao,
                'cpf' => $this->cpf,
                'registro' => $this->registro,
                'created_at' => $this->created_at,
                'update_at' => $this->update_at
            ],
            'relationships' => [
                'eventos' => [
                    'links' => [
                        'self' => route('responsaveis.relationships.eventos', ['id' => $this->id]),
                        'related' => route('responsaveis.eventos', ['id' => $this->id]),
                    ],
                    'data' => EventosIdentifierResource::collection($this->eventos),
                ],
            ]
        ];
    }
}
