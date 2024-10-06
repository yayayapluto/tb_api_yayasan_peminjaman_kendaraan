<?php

namespace App\Repositories;

use App\Classes\ApiResponse;
use App\Http\Requests\Notification\StoreRequest;
use App\Http\Requests\Notification\UpdateRequest;
use App\Http\Resources\NotificationResource;
use App\Interfaces\NotificationInterface;
use App\Models\Notification;

class NotificationRepository implements NotificationInterface
{
    public function index()
    {
        try {
            $notifications = NotificationResource::collection(Notification::all());
            return ApiResponse::sendSuccessResponse("Successfully retrieved notifications", $notifications);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error occurred", $th->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $notification = Notification::find($id);

            if (is_null($notification)) {
                return ApiResponse::sendErrorResponse("Cannot find notification with provided id", code: 404);
            }

            return ApiResponse::sendSuccessResponse("Successfully retrieved notification data", new NotificationResource($notification));
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error occurred", $th->getMessage());
        }
    }

    public function store(StoreRequest $req)
    {
        try {
            $data = $req->validated();
            Notification::create($data);
            return ApiResponse::sendSuccessResponse("Successfully created notification", code: 200);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error occurred", $th->getMessage());
        }
    }

    public function update(UpdateRequest $req, int $id)
    {
        try {
            $data = $req->validated();
            $notification = Notification::find($id);

            if (is_null($notification)) {
                return ApiResponse::sendErrorResponse("Cannot find notification with provided id", code: 404);
            }

            $notification->update($data);
            return ApiResponse::sendSuccessResponse("Successfully updated notification", code: 200);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error occurred", $th->getMessage());
        }
    }

    public function destroy(int $id)
    {
        try {
            $notification = Notification::find($id);

            if (is_null($notification)) {
                return ApiResponse::sendErrorResponse("Cannot find notification with provided id", code: 404);
            }

            $notification->delete();
            return ApiResponse::sendSuccessResponse("Successfully deleted notification", code: 200);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error occurred", $th->getMessage());
        }
    }
}
