<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Http\Resources\AdminResource;
use App\models\Api;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // On récupère tous les utilisateurs
        $donne = Admin::all();

        // On retourne les informations des utilisateurs en JSON
        return response()->json($donne);

           // On récupère tous les utilisateurs
    $Adi = Admin::paginate(10);

    // On retourne les informations des utilisateurs en JSON
    return AdminResource::collection($Adi);

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
            'num_tel'=> 'required',
            "email" => 'required',
            "password" => 'required',
        ]);
        // On crée un nouvel utilisateur
        $admin = Admin::create([
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'num_tel' => $request['num_tel'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($admin, 201);
    }
    /**
     * Display the specified resource. 
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
        // On retourne les informations de l'utilisateur en JSON
    // return response()->json($admin);
    return new AdminResource($admin);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
        $admin->update([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "num_tel"=>$request->num_tel,
            "email"=>$request->email,

        ]);



         // La validation de données
    // $this->validate($request, [
    //     'nom' => 'required',
    //     'prenom' => 'required',
    // ]);

    // On modifie les informations de l'utilisateur
    // $admin->update([
    //     "nom" => $request->nom,
    //     "prenom" => $request->prenom,

    // ]);

    // On retourne la réponse JSON
    return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
         // On supprime l'utilisateur
    $admin->delete();

    // On retourne la réponse JSON
    return response()->json();
    }
}
