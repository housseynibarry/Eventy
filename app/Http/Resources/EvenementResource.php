<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EvenementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        // On retourne uniquement "name" et "email"
        return [
            "theme" => $this->theme,
            "cadre" => $this->cadre,
            "lieux" => $this->lieux,
            "prix_ticket" => $this->prix_ticket,
            "heure" => $this->heure,


        ];
    }
}
