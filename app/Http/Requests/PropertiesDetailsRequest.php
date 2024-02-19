<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertiesDetailsRequest extends FormRequest
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
            "balcony"=> "required",
            "by_the_sea"=> "required",
            "good_condition" => "required",
            "country_side" => "required",
            "equipped" => "required",
            "floor" => "required",
            "furnished_flat" => "required",
            "lift" => "required",
            "new" => "required",
            "stairs" => "required",
        ];
    }
}
