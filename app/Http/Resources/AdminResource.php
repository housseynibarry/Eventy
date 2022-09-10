<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        // On retourne uniquement "name" et "email"
        return [
            "nom" => ucfirst($this->nom), // La 1er lettre en majuscule
            "prenom" => $this->prenom,
            "num_tel" => $this->num_tel,
            "email" => $this->email
        ];
    }
}
