<?php

namespace App\Classes;

class ApiResponse
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function sendSuccessResponse(string $message, $data = [], int $code = 200){
        return response()->json([
            "status" => true,
            "message" => $message,
            "data" => $data
        ], $code);
    }

    public static function sendErrorResponse(string $message, $errors = [], int $code = 500)
    {
        return response()->json([
            "status" => true,
            "message" => $message,
            "errors" => $errors
        ], $code);
    }
}
