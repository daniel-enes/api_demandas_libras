<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InterpretesResource extends JsonResource
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
            'id' => (string)$this->id,
            'type' => 'interpretes',
            'attributes' => [
                'nome' => $this->nome,
                'telefone' => $this->telefone,
                'email' => $this->email,
                'status' => $this->status,
            ]
        ];
    }
}
