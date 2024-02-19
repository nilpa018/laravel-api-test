<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertiesTypesRequest extends FormRequest
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
            "apartment_flat"=> "required",
            "building"=> "required",
            "building_site" => "required",
            "castle" => "required",
            "co_ownership" => "required",
            "property" => "required",
            "simple_house" => "required",
            "land" => "required",
            "on_map" => "required",
            "stable" => "required",
            "statutory_open_land" => "required",
        ];
    }
}
