<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ContractRequest extends FormRequest
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
            'to_build' =>'required',
            'to_sale' =>'required',
            'to_rent' =>'required',
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
            'to_build.required' => "Le champs to_buil est requis",
            'to_sale.required' => "Le champs to_sale est requis",
            'to_rent.required' => "Le champs to_rent est requis",
        ];
    }
}
