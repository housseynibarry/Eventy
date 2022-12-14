<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "nom"=> "request",
            "prenom"=>"",
            "num_tel"=>"request",
            "email" => "required|unique:users".(isset($user_id) ? ",email,".$user_id : ""),
            "password" => "required|min:8"
        ];
    }
}
