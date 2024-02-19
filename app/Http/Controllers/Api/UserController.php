<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Requests\RegisterUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LogUserRequest;

class UserController extends Controller
{
    public function register(RegisterUser $request){
        try {
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password, [
               'rounds' => 12,
            ]);
            
            ($request->role_id) && $user->role_id = $request->role_id;

            $user->save();
            return response()->json([
               'status_code' => 201,
               'status_message' => 'Utilisateur ajouté avec succès',
               'user' => $user, 
           ]);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    public function login(LogUserRequest $request){
        if(auth()->attempt($request->only(['email', 'password']))){

        $user = auth()->user();

        $token = $user->createToken('SECRET_KEY_FOR_BACKEND_ONLY')->plainTextToken;

        return response()->json([
         'status_code' => 200,
         'status_message' => 'Utilisateur connecté avec succès',
            'user' => $user,
            'token' => $token
        ]);
        // Faut il ajouter le token dans le remember token de la table user ?
        } else {
            return response()->json([
                'status_code' => 404,
                'status_message' => 'Informations non valide',
            ]);
        }
    }
   
}
