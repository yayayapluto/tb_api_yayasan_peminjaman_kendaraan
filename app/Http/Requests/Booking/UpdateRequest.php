<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Classes\ApiResponse;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_vehicle' => 'nullable|string|max:36|exists:vehicles,id_vehicle',
            'id_user' => 'nullable|string|exists:users,id',
            'id_driver' => 'nullable|string|max:36',
            'driver_name' => 'nullable|string|max:255',
            'service' => 'nullable|in:internal,external',
            'image' => 'nullable|string',
            'from_address' => 'nullable|string|max:255',
            'from_lon' => 'nullable|decimal:10,7',
            'from_lat' => 'nullable|decimal:10,7',
            'to_address' => 'nullable|string|max:255',
            'to_lon' => 'nullable|decimal:10,7',
            'to_lat' => 'nullable|decimal:10,7',
            'status' => 'nullable|in:new,apr,rej',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, ApiResponse::sendErrorResponse("Validation error", $validator->errors(), 400));
    }
}
