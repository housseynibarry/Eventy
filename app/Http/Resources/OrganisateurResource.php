<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganisateurResource extends JsonResource
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
            "nom" => ucfirst($this->nom), // La 1er lettre en majuscule
            "prenom"=>ucfirst($this->prenom),
            "num_tel"=>ucfirst($this->num_tel),
            "email" => $this->email
        ];
    }
}
