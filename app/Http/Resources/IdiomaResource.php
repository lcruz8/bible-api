<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IdiomaResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string|null
     */
    public static $wrap = 'idioma';


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        // dd($this);

        return [
            'id' => $this->id,
            'nome' => $this->nome,
            "links" => [
                [
                    'rel' => 'Alterar idioma',
                    'type' => 'PUT',
                    'link' => route('idioma.update', $this->id),
                ],
                [
                    'rel' => 'Excluir idioma',
                    'type' => 'DELETE',
                    'link' => route('idioma.destroy', $this->id),
                ],
            ]
        ];
        // return parent::toArray($request);
    }
}
