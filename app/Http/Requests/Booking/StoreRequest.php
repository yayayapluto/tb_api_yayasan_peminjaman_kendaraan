<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Classes\ApiResponse;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_booking' => 'required|integer|max:36|unique:bookings,id_booking',
            'id_vehicle' => 'required|integer|max:36|exists:vehicles,id',
            'id_user' => 'required|integer|exists:users,id',
            'id_driver' => 'nullable|integer|max:36',
            'driver_name' => 'required|string|max:255',
            'service' => 'required|in:internal,external',
            'image' => 'required|string',
            'from_address' => 'required|string|max:255',
            'from_lon' => 'required|numeric',
            'from_lat' => 'required|numeric',
            'to_address' => 'required|string|max:255',
            'to_lon' => 'required|numeric',
            'to_lat' => 'required|numeric',
            'status' => 'required|in:new,apr,rej',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, ApiResponse::sendErrorResponse("Validation error", $validator->errors(), 400));
    }
}
