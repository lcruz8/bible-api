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
            'testamento_id' => $this->testamento_id, 
            'created_at' => $this->created_at, 
            'updated_at' => $this->updated_at, 
            'versao_id' => $this->versao_id, 
            'capa' => Storage::disk('public')->url($this->capa)
        ];
    }
}
