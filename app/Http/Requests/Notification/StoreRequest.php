<?php

namespace App\Http\Requests\Notification;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Classes\ApiResponse;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'booking_id' => 'required|exists:bookings,id',
            'user_id' => 'required|exists:users,id',
            'admin_id' => 'required|exists:users,id',
            'status' => 'required|in:new,apr,rej',
            'message' => 'required|string|max:255',
            'is_read' => 'boolean',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, ApiResponse::sendErrorResponse("Validation error", $validator->errors(), 400));
    }
}
