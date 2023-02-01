<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\InterpretesIdentifierResource;

class HorariosResource extends JsonResource
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
            'type' => 'horarios',
            'attributes' => [
                'modalidade' => $this->modalidade,
                'dia' => $this->dia,
                'inicia' => $this->inicia,
                'termina' => $this->termina,
                'local' => $this->local,
                'material' => $this->material,
                'agenda' => $this->agenda,
                'observacoes' => $this->observacoes,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'realationships' => [
                'interpretes' => [
                    'links' => [
                        'self' => route (
                            horarios.realationships.interpretes, 
                            ['id' => $this->id]
                        ),
                        'related' => route(
                            horarios.interpretes,
                            ['id' => $this->id]
                        )
                        
                    ],
                    'data' => InterpretesIdentifierResource::collection($his->interpretes),
                ],
            ],
        ];
    }
}
