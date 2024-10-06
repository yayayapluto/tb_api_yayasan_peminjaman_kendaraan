<?php

namespace App\Repositories;

use App\Classes\ApiResponse;
use App\Http\Requests\Vehicle\StoreRequest;
use App\Http\Requests\Vehicle\UpdateRequest;
use App\Http\Resources\VehicleResource;
use App\Interfaces\VehicleInterface;
use App\Models\Vehicle;

class VehicleRepository implements VehicleInterface
{
    public function index()
    {
        try {
            $vehicles = VehicleResource::collection(Vehicle::all());
            return ApiResponse::sendSuccessResponse("Successfully retrieved vehicles data", $vehicles);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error occurred", $th->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $vehicle = Vehicle::find($id);

            if (is_null($vehicle)) {
                return ApiResponse::sendErrorResponse("Cannot find vehicle with provided id", code: 404);
            }

            return ApiResponse::sendSuccessResponse("Successfully retrieved vehicle data", new VehicleResource($vehicle));
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error occurred", $th->getMessage());
        }
    }

    public function search(string $query)
    {
        try {
            $vehicles = Vehicle::where("id_vehicle", "LIKE", "%$query%")
                ->orWhere("brand", "LIKE", "%$query%")
                ->orWhere("model", "LIKE", "%$query%")
                ->get();

            if ($vehicles->isEmpty()) {
                return ApiResponse::sendErrorResponse("Cannot find vehicles with provided query", code: 404);
            }

            return ApiResponse::sendSuccessResponse("Successfully retrieved search data", VehicleResource::collection($vehicles));
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error occurred", $th->getMessage());
        }
    }

    public function store(StoreRequest $req)
    {
        try {
            $data = $req->validated();
            Vehicle::create($data);
            return ApiResponse::sendSuccessResponse("Successfully created vehicle", code: 200);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error occurred", $th->getMessage());
        }
    }

    public function update(UpdateRequest $req, int $id)
    {
        try {
            $data = $req->validated();
            $vehicle = Vehicle::find($id);

            if (is_null($vehicle)) {
                return ApiResponse::sendErrorResponse("Cannot find vehicle with provided id", code: 404);
            }

            $vehicle->update($data);
            return ApiResponse::sendSuccessResponse("Successfully updated vehicle", code: 200);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error occurred", $th->getMessage());
        }
    }

    public function destroy(int $id)
    {
        try {
            $vehicle = Vehicle::find($id);

            if (is_null($vehicle)) {
                return ApiResponse::sendErrorResponse("Cannot find vehicle with provided id", code: 404);
            }

            $vehicle->delete();
            return ApiResponse::sendSuccessResponse("Successfully deleted vehicle", code: 200);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error occurred", $th->getMessage());
        }
    }
}
