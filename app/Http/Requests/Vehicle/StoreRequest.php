<?php

namespace App\Http\Requests\Vehicle;

use App\Classes\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_vehicle' => 'required|string|max:36|unique:vehicles,id_vehicle',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'nopol' => 'required|string|max:10|unique:vehicles,nopol',
            'is_available' => 'required|boolean',
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new ValidationException($validator, ApiResponse::sendErrorResponse("Validation error", $validator->errors(), 400));
    }
}
