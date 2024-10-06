<?php

namespace App\Repositories;

use App\Classes\ApiResponse;
use App\Http\Requests\Booking\StoreRequest;
use App\Http\Requests\Booking\UpdateRequest;
use App\Http\Resources\BookingResource;
use App\Interfaces\BookingInterface;
use App\Models\Booking;

class BookingRepository implements BookingInterface
{
    public function index()
    {
        try {
            $bookings = BookingResource::collection(Booking::all());
            return ApiResponse::sendSuccessResponse("Successfully retrieved bookings data", $bookings);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error occurred", $th->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $booking = Booking::find($id);

            if (is_null($booking)) {
                return ApiResponse::sendErrorResponse("Cannot find booking with provided id", code: 404);
            }

            return ApiResponse::sendSuccessResponse("Successfully retrieved booking data", new BookingResource($booking));
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error occurred", $th->getMessage());
        }
    }

    public function store(StoreRequest $req)
    {
        try {
            $data = $req->validated();
            Booking::create($data);
            return ApiResponse::sendSuccessResponse("Successfully created booking", code: 200);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error occurred", $th->getMessage());
        }
    }

    public function update(UpdateRequest $req, int $id)
    {
        try {
            $data = $req->validated();
            $booking = Booking::find($id);

            if (is_null($booking)) {
                return ApiResponse::sendErrorResponse("Cannot find booking with provided id", code: 404);
            }

            $booking->update($data);
            return ApiResponse::sendSuccessResponse("Successfully updated booking", code: 200);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error occurred", $th->getMessage());
        }
    }

    public function destroy(int $id)
    {
        try {
            $booking = Booking::find($id);

            if (is_null($booking)) {
                return ApiResponse::sendErrorResponse("Cannot find booking with provided id", code: 404);
            }

            $booking->delete();
            return ApiResponse::sendSuccessResponse("Successfully deleted booking", code: 200);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error occurred", $th->getMessage());
        }
    }
}
