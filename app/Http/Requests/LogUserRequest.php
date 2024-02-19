<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;   
use Illuminate\Contracts\Validation\Validator;

class LogUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email:users,email',
            'password' => 'required',
        ];
    }

    public function failedValidation(Validator $validator): void {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' =>  true,
            'message' => 'error de validation',
            'errorsList' => $validator->errors()
        ]));
    }

    public function messages(): array
    {
        return [
            'email.required' => "L'email est requis",
            'email.email' => "L'email est non valide",
            'email.exists' => "L'email n'a pas été trouvé",
            'password.required' => "Le password est requis",

        ];
    }
}
