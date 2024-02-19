<?php

namespace App\Http\Controllers\Api;

use App\Models\Agreement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgreementRequest;

class AgreementController extends Controller
{
    public function index(Request $request){
        try {
            $query = Agreement::query();
            $result = $query->get();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Les accords ont été récupérées avec succès",
                'agreements' => $result
             ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function store(AgreementRequest $request)
    {
        if(auth()->user()->role->name === "admin"){
        try {

            $agreement = new Agreement();
            $agreement->bill_of_sale = $request->bill_of_sale;
            $agreement->lease = $request->lease;
            $agreement->inventory = $request->inventory;
            $agreement->guarantee = $request->guarantee;

            $agreement->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => 'Accord ajouté avec succès',
                'data' => $agreement,
            ]);
        } catch (Exception $e){
            return response()->json($e);
        } 
    } else {
        return response()->json([
         'status_code' => 403,
         'status_message' => 'Vous n\'êtes pas autorisé à créer de nouvel accord'
        ]);
    }
    }

    public function update(AgreementRequest $request, Agreement $agreement)
    {
        if(auth()->user()->role->name === "admin"){
        try {
            $agreement->bill_of_sale = $request->bill_of_sale;
            $agreement->lease = $request->lease;
            $agreement->inventory = $request->inventory;
            $agreement->guarantee = $request->guarantee;

            $agreement->save();
            return response()->json([
                'status_code' => 200,
                'status_message' => 'Accord modifié avec succès',
                'data' => $agreement,
             ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    } else {
        return response()->json([
          'status_code' => 403,
          'status_message' => "Vous n'êtes pas autorisé à modifier cet accord"
        ]);
    }
    }

    public function delete(Agreement $agreement)
    {
        try{
            if(auth()->user()->role->name === "admin"){
                $agreement->delete();
            } else {
                return response()->json([
                    'status_code' => 422,
                    'status_message' => "Vous n'êtes pas autorisé à supprimer cet accord",
                 ]);
            }

            return response()->json([
                'status_code' => 200,
                'status_message' => "L'accord a été supprimé",
                'data' => $agreement,
             ]);
        }catch (Exception $e){
            return response()->json($e);
        }
    
    }
}
