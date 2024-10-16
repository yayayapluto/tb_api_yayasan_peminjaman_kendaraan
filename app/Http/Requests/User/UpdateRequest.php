<?php

namespace App\Http\Requests\User;

use App\Classes\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "id_user" => "nullable|string|unique:users,id_user," . $this->user,
            "nama" => "nullable|string",
            "password" => "nullable|string|min:6",
            "level" => "nullable|numeric",
            "is_enable" => "nullable|boolean"
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new ValidationException($validator, ApiResponse::sendErrorResponse("Validation error", $validator->errors(), 400));
    }
}
