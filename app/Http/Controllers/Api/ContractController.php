<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContractRequest;

class ContractController extends Controller
{
    public function index(Request $request){
        try {
            $query = Contract::query();
            $result = $query->get();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Les contrats ont été récupérées avec succès",
                'contacts' => $result
             ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function store(ContractRequest $request)
    {
        if(auth()->user()->role->name === "admin"){
        try {

            $contract = new Contract();
            $contract->to_build = $request->to_build;
            $contract->to_sale = $request->to_sale;
            $contract->to_rent = $request->to_rent;

            $contract->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => 'Contrat ajouté avec succès',
                'data' => $contract,
            ]);
        } catch (Exception $e){
            return response()->json($e);
        } 
    } else {
        return response()->json([
         'status_code' => 403,
         'status_message' => 'Vous n\'êtes pas autorisé à créer de nouveaux contrats'
        ]);
    }
    }

    public function update(ContractRequest $request, Contract $contract)
    {
        if(auth()->user()->role->name === "admin"){
        try {
            $contract->to_build = $request->to_build;
            $contract->to_sale = $request->to_sale;
            $contract->to_rent = $request->to_rent;

            $contract->save();
            return response()->json([
                'status_code' => 200,
                'status_message' => 'Contrat modifié avec succès',
                'data' => $contract,
             ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    } else {
        return response()->json([
          'status_code' => 403,
          'status_message' => "Vous n'êtes pas autorisé à modifier ce contrat"
        ]);
    }
    }

    public function delete(Contract $contract)
    {
        try{
            if(auth()->user()->role->name === "admin"){
                $contract->delete();
            } else {
                return response()->json([
                    'status_code' => 422,
                    'status_message' => "Vous n'êtes pas autorisé à supprimer ce contrat",
                 ]);
            }

            return response()->json([
                'status_code' => 200,
                'status_message' => "Le contrat a été supprimé",
                'data' => $contract
             ]);
        }catch (Exception $e){
            return response()->json($e);
        }
    
    }

}
