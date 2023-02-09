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
        //'data' => [
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
                  'data' => HorariosIdentifierResource::collection($this->whenLoaded('horarios')),
                  //'data' => HorariosIdentifierResource::collection($this->horarios),
              ],
          ],
      ];
    }

    private function relationsResponsavel() {
        return new ResponsaveisResource($this->whenLoaded('responsavel'));
        //return new ResponsaveisResource($this->responsavel);
    }
    
    private function relationsHorarios() {
        return HorariosResource::collection($this->whenLoaded('horarios'));
        //return HorariosResource::collection($this->horarios);
    }

    private function include($request) {
      /*if(($request->has('include') == 'responsavel') && 
      ($request->has('include') == 'horarios'))
      {
        $horarios = collect($this->relationsHorarios());
        $concatenated = $horarios->concat($horarios);
        return $concatenated;
      }*/
      $included = false;
      if($request->has('include')) {
        
        $responsavel = collect([$this->relationsResponsavel()]);
        if($request->include == 'responsavel')
        {
          //$responsavel = collect([$this->relationsResponsavel()]);
          //$included = $responsavel;
          return $responsavel;
        }
        $horarios = collect($this->relationsHorarios());
        if($request->include == 'horarios') {
          //$collection = collect($this->relationsHorarios());
          //$horarios = collect($this->relationsHorarios());
          //$included = $horarios;
          return $horarios;
        }
        
        if(($request->include == 'responsavel,horarios') or
        ($request->include == 'horarios,responsavel')) 
        {
          $included = $horarios->concat($responsavel);
        }
        
      }
      return $included;
    }
    public function with($request) {
      $included = $this->include($request);
      if($included) {
        return [
          'included' => $included,
        ];
      }
      return [];
      //$included = $this->include($request);
      /*
      if($included) {
        return [
          'included' => $included,
        ];
      }
      */
    }
    
    /*
    public function with($request) {
      $collection = collect($this->relationsHorarios());
      $concatenated = $collection->concat([$this->relationsResponsavel()]);
        
      $this->mergeWhen($request->has('include'), [
          'included' => $concatenated->all(),
        ]
      );
        /*
        $collection = collect($this->relationsHorarios());
        $concatenated = $collection->concat([$this->relationsResponsavel()]);
        
        return [
            'included' => $concatenated->all(),
        ];
      /*
        $collection = collect($this->relationsHorarios());
        $concatenated = $collection->concat([$this->relationsResponsavel()]);
        return [
            'included' => $concatenated->all(),
        ];
      
    }*/
}
