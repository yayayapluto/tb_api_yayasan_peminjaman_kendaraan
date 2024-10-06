<?php

namespace App\Http\Requests\Notification;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Classes\ApiResponse;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => 'sometimes|required|in:new,apr,rej',
            'message' => 'sometimes|required|string|max:255',
            'is_read' => 'sometimes|boolean',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, ApiResponse::sendErrorResponse("Validation error", $validator->errors(), 400));
    }
}
