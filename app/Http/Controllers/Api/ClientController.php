<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
// use App\Http\Resources\AdminResource;
use App\Http\Resources\ClientResource;
use App\models\Api;
use Illuminate\Http\Request;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // On récupère tous les utilisateurs
        $donne =Client::all();

        // On retourne les informations des utilisateurs en JSON
        return response()->json($donne);

           // On récupère tous les utilisateurs
    $Adi = Client::paginate(10);

    // On retourne les informations des utilisateurs en JSON
    return ClientResource::collection($Adi);

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
            // La validation de données
            $this->validate($request, [
                'nom' => 'required',
                'prenom' => 'required',
                'num_tel' => 'required',
                "email" => 'required',
                "password" => 'required',
            ]);

            // On crée un nouvel utilisateur
            $client = Client::create([
                'nom' => $request['nom'],
                'prenom' => $request['prenom'],
                'num_tel' => $request['num_tel'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),


            ]);

            // On retourne les informations du nouvel utilisateur en JSON
            return response()->json($client, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
        return new ClientResource($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
        $client->update([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "num_tel" => $request->num_tel,


        ]);
        // On retourne la réponse JSON
    return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
             // On supprime l'utilisateur
    $client->delete();

    // On retourne la réponse JSON
    return response()->json();
    }
}
