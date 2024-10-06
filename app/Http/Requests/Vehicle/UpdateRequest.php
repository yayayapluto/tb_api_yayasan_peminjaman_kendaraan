<?php

namespace App\Http\Requests\Vehicle;

use App\Classes\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'nopol' => 'nullable|string|max:10',
            'is_available' => 'nullable|boolean',
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new ValidationException($validator, ApiResponse::sendErrorResponse("Validation error", $validator->errors(), 400));
    }
}
