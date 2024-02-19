<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PropertiesDetails;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertiesDetailsRequest;

class PropertiesDetailsController extends Controller
{
    public function index(Request $request){
        try {
            $query = PropertiesDetails::query();
            $result = $query->get();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Les détails du bien ont été récupérées avec succès",
                'properties_details' => $result
             ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function store(PropertiesDetailsRequest $request)
    {
        if(auth()->user()->role->name === "admin"){
        try {

            $prop_details = new PropertiesDetails();
            $prop_details->balcony = $request->balcony;
            $prop_details->by_the_sea = $request->by_the_sea;
            $prop_details->good_condition = $request->good_condition;
            $prop_details->country_side = $request->country_side;
            $prop_details->equipped = $request->equipped;
            $prop_details->floor = $request->floor;
            $prop_details->furnished_flat = $request->furnished_flat;
            $prop_details->lift = $request->lift;
            $prop_details->new = $request->new;
            $prop_details->stairs = $request->stairs;

            $prop_details->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => 'Les détails du bien ont étés ajoutés avec succès',
                'data' => $prop_details,
            ]);
        } catch (Exception $e){
            return response()->json($e);
        } 
    } else {
        return response()->json([
         'status_code' => 403,
         'status_message' => 'Vous n\'êtes pas autorisé à créer de nouveau détail du bien',
        ]);
    }
    }

    public function update(PropertiesDetailsRequest $request, PropertiesDetails $prop_details)
    {
        if(auth()->user()->role->name === "admin"){
        try {
            $prop_details->balcony = $request->balcony;
            $prop_details->by_the_sea = $request->by_the_sea;
            $prop_details->good_condition = $request->good_condition;
            $prop_details->country_side = $request->country_side;
            $prop_details->equipped = $request->equipped;
            $prop_details->floor = $request->floor;
            $prop_details->furnished_flat = $request->furnished_flat;
            $prop_details->lift = $request->lift;
            $prop_details->new = $request->new;
            $prop_details->stairs = $request->stairs;

            $prop_details->save();
            return response()->json([
                'status_code' => 200,
                'status_message' => 'Détail du bien modifié avec succès',
                'data' => $prop_details,
             ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    } else {
        return response()->json([
          'status_code' => 403,
          'status_message' => "Vous n'êtes pas autorisé à modifier les détails du bien",
        ]);
    }
    }

    public function delete(PropertiesDetails $prop_details)
    {
        try{
            if(auth()->user()->role->name === "admin"){
                $prop_details->delete();
            } else {
                return response()->json([
                    'status_code' => 422,
                    'status_message' => "Vous n'êtes pas autorisé à supprimer ce détail du bien",
                 ]);
            }

            return response()->json([
                'status_code' => 200,
                'status_message' => "Le détail du bien a été supprimé",
                'data' => $prop_details,
             ]);
        }catch (Exception $e){
            return response()->json($e);
        }
    
    }

}
