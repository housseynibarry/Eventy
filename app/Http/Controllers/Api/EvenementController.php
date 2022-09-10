<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Evenement;
use App\Http\Resources\EvenementResource;
use App\models\Api;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $donne = Evenement::all();

        // On retourne les informations des utilisateurs en JSON
        return response()->json($donne);

           // On récupère tous les utilisateurs
    $Adi = Evenement::paginate(10);

    // On retourne les informations des utilisateurs en JSON
    return EvenementResource::collection($Adi);

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
                'theme' => 'required',
                'cadre' => 'required',
                'lieux' => 'required',
                'prix_ticket' => 'required',
                'heure' => 'required',



            ]);

            // On crée un nouvel utilisateur
            $evenement = Evenement::create([
                'theme'=>$request['theme'],
                'cadre'=>$request['cadre'],
                'lieux'=>$request['lieux'],
                'prix_ticket'=>$request['prix_ticket'],
                'heure'=>$request['heure'],


            ]);

            // On retourne les informations du nouvel utilisateur en JSON
            return response()->json($evenement, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function show(Evenement $evenement)
    {
        //
        return new EvenementResource($evenement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function edit(Evenement $evenement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evenement $evenement)
    {
        //
        $evenement->update([
                "theme"=>$request->theme,
                "cadre"=>$request->cadre,
                "lieux"=>$request->lieux,
                "prix_ticket"=>$request->prix_ticket,
                "heure"=>$request->heure,

        ]);
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evenement $evenement)
    {
        //
         // On supprime l'utilisateur
    $evenement->delete();

    // On retourne la réponse JSON
    return response()->json();
    }
}
