<?php

namespace App\Http\Controllers\Api;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;

class ProductsController extends Controller
{
    public function index(Request $request){
        try {
            $query = Products::query();
            $result = $query->get();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Les produits ont été récupérées avec succès",
                'products' => $result
             ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function store(ProductsRequest $request)
    {
        if(auth()->user()->role->name === "admin"){
        try {

            $products = new Products();
            $products->address = $request->address;
            $products->locality = $request->locality;
            $products->country = $request->country;
            $products->property_description = $request->property_description;
            $products->owner = $request->owner;
            $products->representative = $request->representative;
            $products->price = $request->price;
            $products->payment = $request->payment;
            $products->user_id = $request->user_id;
            $products->contract_id = $request->contract_id;
            $products->properties_details_id = $request->properties_details_id;
            $products->properties_types_id = $request->properties_types_id;
            $products->agreements_id = $request->agreements_id;

            $products->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => 'Le produit a bien été ajouté avec succès',
                'data' => $products,
            ]);
        } catch (Exception $e){
            return response()->json($e);
        } 
    } else {
        return response()->json([
         'status_code' => 403,
         'status_message' => 'Vous n\'êtes pas autorisé à créer de nouveau produit',
        ]);
    }
    }

    public function update(ProductsRequest $request, Products $products)
    {
        if(auth()->user()->role->name === "admin"){
        try {
            $products->address = $request->address;
            $products->locality = $request->locality;
            $products->country = $request->country;
            $products->property_description = $request->property_description;
            $products->owner = $request->owner;
            $products->representative = $request->representative;
            $products->price = $request->price;
            $products->payment = $request->payment;
            $products->user_id = $request->user_id;
            $products->contract_id = $request->contract_id;
            $products->properties_details_id = $request->properties_details_id;
            $products->properties_types_id = $request->properties_types_id;
            $products->agreements_id = $request->agreements_id;

            $products->save();
            return response()->json([
                'status_code' => 200,
                'status_message' => 'Produit modifié avec succès',
                'data' => $products,
             ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    } else {
        return response()->json([
          'status_code' => 403,
          'status_message' => "Vous n'êtes pas autorisé à modifier le produit",
        ]);
    }
    }

    public function delete(Products $products)
    {
        try{
            if(auth()->user()->role->name === "admin"){
                $products->delete();
            } else {
                return response()->json([
                    'status_code' => 422,
                    'status_message' => "Vous n'êtes pas autorisé à supprimer le produit",
                 ]);
            }

            return response()->json([
                'status_code' => 200,
                'status_message' => "Le produit a été supprimé",
                'data' => $products,
             ]);
        }catch (Exception $e){
            return response()->json($e);
        }
    
    }

}
