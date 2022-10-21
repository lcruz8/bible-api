<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class LivroResource extends JsonResource
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
            'id' => $this->id, 
            'nome' => $this->nome, 
            'abreviacao' => $this->abreviacao, 
            'testamento' => $this->whenLoaded('testamentos'), 
            'versiculos' => $this->whenLoaded('versiculos'), 
            'versoes' => new VersaoResource($this->whenLoaded('versoes')), 
            'capa' => Storage::disk('public')->url($this->capa)
        ];
    }
}
