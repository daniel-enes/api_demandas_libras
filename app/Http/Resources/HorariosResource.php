<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\InterpretesIdentifierResource;
use App\Http\Resources\InterpretesResource;

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
      $data = date_create($this->dia);
        return [
            'id' => (string)$this->id,
            'type' => 'horarios',
            'attributes' => [
                'modalidade' => $this->modalidade,
                'dia' => date_format($data, "d/m/Y"),
                'inicia' => $this->inicia,
                'termina' => $this->termina,
                'local' => $this->local,
                'material' => $this->material,
                'agenda' => $this->agenda,
                'observacoes' => $this->observacoes,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                'interpretes' => [
                    'links' => [
                        'self' => route (
                            'horarios.relationships.interpretes', 
                            ['id' => $this->id]
                        ),
                        'related' => route(
                            'horarios.interpretes',
                            ['id' => $this->id]
                        )
                        
                    ],
                    //'data' => HorariosIdentifierResource::collection($this->whenLoaded('interpretes')),
                    'data' => InterpretesIdentifierResource::collection($this->interpretes),
                ],
            ],
        ];
    }
    private function relationsInterpretes() {
        return InterpretesResource::collection($this->whenLoaded('interpretes'));
    }

    public function with($request) {
        return [
            'included' => $this->relationsInterpretes(),
        ];
    }
}
