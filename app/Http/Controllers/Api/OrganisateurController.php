<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Organisateur;
use App\Http\Resources\OrganisateurResource;
// use App\Http\Resources\OrganisateurResource;
use App\models\Api;
use Illuminate\Http\Request;

class OrganisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

$donne =Organisateur::all();

// On retourne les informations des utilisateurs en JSON
return response()->json($donne);

   // On récupère tous les utilisateurs
$Adi = Organisateur::paginate(10);

// On retourne les informations des utilisateurs en JSON
return Organisateur::collection($Adi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

 $this->validate($request, [
    'nom' => 'required',
    'prenom' => 'required',
    'num_tel' => 'required',
    "email" => 'required',
    "password" => 'required',
]);

// On crée un nouvel utilisateur
$organisateur = Organisateur::create
([
    'nom' => $request['nom'],
    'prenom' => $request['prenom'],
    'num_tel' => $request['num_tel'],
    'email' => $request['email'],
    'password' => bcrypt($request['password']),


]);

// On retourne les informations du nouvel utilisateur en JSON
return response()->json($organisateur, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organisateur  $organisateur
     * @return \Illuminate\Http\Response
     */
    public function show(Organisateur $organisateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organisateur  $organisateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisateur $organisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organisateur  $organisateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisateur $organisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organisateur  $organisateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisateur $organisateur)
    {
        //
        $organisateur->delete();

        // On retourne la réponse JSON
        return response()->json();
    }
}
