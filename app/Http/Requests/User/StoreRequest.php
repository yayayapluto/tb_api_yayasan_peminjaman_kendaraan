<?php

namespace App\Http\Requests\User;

use App\Classes\ApiResponse;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Password;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "id_user" => "required|string|unique:users,id_user",
            "name" => "required|string",
            "password" => "required|string|min:6",
            "level" => "required|numeric",
            "is_enable" => "required|boolean"
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator) {
        throw new ValidationException($validator, ApiResponse::sendErrorResponse("Validation error", $validator->errors(), 400));
    }
}
