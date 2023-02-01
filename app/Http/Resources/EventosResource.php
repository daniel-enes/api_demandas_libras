<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\HorariosIdentifierResource;
use App\Http\Resources\HorariosResource;
use App\Http\Resources\ResponsaveisIdentifierResource;
use App\Http\Resources\ResponsaveisResource;

class EventosResource extends JsonResource
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
            'type' => 'eventos',
            'attributes' => [
                'titulo' =>      $this->titulo,
                'sobre' =>       $this->sobre,
                'informacoes' => $this->informacoes,
                'created_at' =>  $this->created_at,
                'updated_at' =>  $this->updated_at,   
            ],
            'relationships' => [
                'responsaveis' => [
                    'links' => [
                        'self' => route('eventos.relationships.responsaveis', ['id' => $this->id]),
                        'related' => route('eventos.responsaveis', ['id' => $this->id])
                    ],
                    'data' => new ResponsaveisIdentifierResource($this->whenLoaded('responsavel')),
                ],
                'horarios' => [
                    'links' => [
                        'self' => route('eventos.relationships.horarios', ['id' => $this->id]),
                        'related' => route('eventos.horarios', ['id' => $this->id])
                    ],
                    //'data' => HorariosIdentifierResource::collection($this->whenLoaded('horarios')),
                    'data' => HorariosIdentifierResource::collection($this->horarios),
                ],
            ],
        ];
    }
    
    private function relationsResponsavel() {
        //return new ResponsaveisResource($this->whenLoaded('responsavel'));
        return new ResponsaveisResource($this->responsavel);
    }
    
    private function relationsHorarios() {
        //return HorariosResource::collection($this->whenLoaded('horarios'));
        return HorariosResource::collection($this->horarios);
    }

    public function with($request) {
        $collection = collect($this->relationsHorarios());
        $concatenated = $collection->concat([$this->relationsResponsavel()]);
        return [
            'included' => $concatenated->all(),
        ];
    }
}
