<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            "address"=> "required",
            "locality"=> "required",
            "country" => "required",
            "owner" => "required",
            "representative" => "required",
            "price" => "required",
            "payment" => "required",
            "user_id" => "required",
            "contract_id" => "required",
            "properties_details_id" => "required",
            "properties_types_id" => "required",
            "agreements_id" => "required",
        ];
    }
}
