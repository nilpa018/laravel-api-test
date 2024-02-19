<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ContractController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\AgreementController;
use App\Http\Controllers\Api\PropertiesTypesController;
use App\Http\Controllers\Api\PropertiesDetailsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// ROUTES TOUT ACCES

// Récupérer la liste des contrats
Route::get('/contracts', [ContractController::class,'index']);
Route::get('/agreements', [AgreementController::class,'index']);
Route::get('/properties_details', [PropertiesDetailsController::class,'index']);
Route::get('/properties_types', [PropertiesTypesController::class,'index']);
Route::get('/products', [ProductsController::class,'index']);

// Inscrire un nouvel utilisateur
Route::post('/register', [UserController::class,'register']);
Route::post('/login', [UserController::class, 'login']);


//ROUTES NECESSITANT UNE AUTHENTIFICATION ET LES DROITS ADMIN
Route::middleware('auth:sanctum')->group(function () {

    // Ajouter
    Route::post('contracts/create', [ContractController::class,'store']);
    Route::post('agreements/create', [AgreementController::class,'store']);
    Route::post('properties_details/create', [PropertiesDetailsController::class,'store']);
    Route::post('properties_types/create', [PropertiesTypesController::class,'store']);
    Route::post('products/create', [ProductsController::class,'store']);

    // Editer
    Route::put('contracts/edit/{contract}', [ContractController::class, 'update']);
    Route::put('agreements/edit/{agreement}', [AgreementController::class, 'update']);
    Route::put('properties_details/edit/{prop_details}', [PropertiesDetailsController::class, 'update']);
    Route::put('properties_types/edit/{prop_types}', [PropertiesTypesController::class, 'update']);
    Route::put('products/edit/{products}', [ProductsController::class, 'update']);

    // Supprimer
    Route::delete('contracts/{contract}', [ContractController::class, 'delete']);
    Route::delete('agreements/{agreement}', [AgreementController::class, 'delete']);
    Route::delete('properties_details/{prop_details}', [PropertiesDetailsController::class, 'delete']);
    Route::delete('properties_types/{prop_types}', [PropertiesTypesController::class, 'delete']);
    Route::delete('products/{products}', [ProductsController::class, 'delete']);

    // Récupérer les information de l'utilisateur actuellemnt connecté
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
