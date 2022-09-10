<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\OrganisateurController;
use App\Http\Controllers\Api\EvenementController;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('Admin', AdminController::class);
Route::apiResource('Client',ClientController::class);
Route::apiResource('Organisateur', OrganisateurController::class);
 Route::apiResource('Evenement', EvenementController::class);

