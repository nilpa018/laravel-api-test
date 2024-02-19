<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PropertiesTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertiesTypesRequest;

class PropertiesTypesController extends Controller
{
    public function index(Request $request){
        try {
            $query = PropertiesTypes::query();
            $result = $query->get();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Les types de biens ont été récupérées avec succès",
                'properties_types' => $result
             ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function store(PropertiesTypesRequest $request)
    {
        if(auth()->user()->role->name === "admin"){
        try {

            $prop_types = new PropertiesTypes();
            $prop_types->apartment_flat = $request->apartment_flat;
            $prop_types->building = $request->building;
            $prop_types->building_site = $request->building_site;
            $prop_types->castle = $request->castle;
            $prop_types->co_ownership = $request->co_ownership;
            $prop_types->property = $request->property;
            $prop_types->simple_house = $request->simple_house;
            $prop_types->land = $request->land;
            $prop_types->on_map = $request->on_map;
            $prop_types->stable = $request->stable;
            $prop_types->statutory_open_land = $request->statutory_open_land;

            $prop_types->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => 'Les types du bien ont étés ajoutés avec succès',
                'data' => $prop_types,
            ]);
        } catch (Exception $e){
            return response()->json($e);
        } 
    } else {
        return response()->json([
         'status_code' => 403,
         'status_message' => 'Vous n\'êtes pas autorisé à créer de nouveaux types du bien',
        ]);
    }
    }

    public function update(PropertiesTypesRequest $request, PropertiesTypes $prop_types)
    {
        if(auth()->user()->role->name === "admin"){
        try {
            $prop_types->apartment_flat = $request->apartment_flat;
            $prop_types->building = $request->building;
            $prop_types->building_site = $request->building_site;
            $prop_types->castle = $request->castle;
            $prop_types->co_ownership = $request->co_ownership;
            $prop_types->property = $request->property;
            $prop_types->simple_house = $request->simple_house;
            $prop_types->land = $request->land;
            $prop_types->on_map = $request->on_map;
            $prop_types->stable = $request->stable;
            $prop_types->statutory_open_land = $request->statutory_open_land;

            $prop_types->save();
            return response()->json([
                'status_code' => 200,
                'status_message' => 'Types du bien modifié avec succès',
                'data' => $prop_types,
             ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    } else {
        return response()->json([
          'status_code' => 403,
          'status_message' => "Vous n'êtes pas autorisé à modifier les types du bien",
        ]);
    }
    }

    public function delete(PropertiesTypes $prop_types)
    {
        try{
            if(auth()->user()->role->name === "admin"){
                $prop_types->delete();
            } else {
                return response()->json([
                    'status_code' => 422,
                    'status_message' => "Vous n'êtes pas autorisé à supprimer les types du bien",
                 ]);
            }

            return response()->json([
                'status_code' => 200,
                'status_message' => "Les types du bien ont étés supprimés",
                'data' => $prop_types,
             ]);
        }catch (Exception $e){
            return response()->json($e);
        }
    
    }
}
