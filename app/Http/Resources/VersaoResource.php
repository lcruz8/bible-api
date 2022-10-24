<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VersaoResource extends JsonResource
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
            'idiomas' => new IdiomaResource($this->whenLoaded('idiomas')),
            'livros' => new LivrosCollection($this->whenLoaded('livros')),
            "links" => [
                [
                    'rel' => 'Alterar versao',
                    'type' => 'PUT',
                    'link' => route('versao.update', $this->id),
                ],
                [
                    'rel' => 'Excluir versao',
                    'type' => 'DELETE',
                    'link' => route('versao.destroy', $this->id),
                ],
            ]

        ];
    }
}
