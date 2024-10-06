<?php

namespace App\Repositories;
use App\Classes\ApiResponse;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function index(){
        try {
            $users = UserResource::collection(User::all());
            return ApiResponse::sendSuccessResponse("Successfully retrieve users data", $users);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error suddenly occurred", $th->getMessage());
        } 
    }

    public function show(int $id){
        try {
            $user = User::find($id);

            if (is_null($user)) {
                return ApiResponse::sendErrorResponse("Cannot find user with provided id", code: 404);
            }

            $userResource = new UserResource($user);

            return ApiResponse::sendSuccessResponse("Successfully retrieve user data", $userResource);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error suddenly occurred", $th->getMessage());
        }
    }

    public function search(string $query) {
        try {
            $users = User::where("id_user", "LIKE", "%$query%")
                ->orWhere("name", "LIKE", "%$query%")->get();

            if (empty($user)) {
                return ApiResponse::sendErrorResponse("Cannot find users with provided query", code: 404);
            }

            return ApiResponse::sendSuccessResponse("Successfully retrieve search data", UserResource::collection($users));
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error suddenly occurred", $th->getMessage());
        }
    }

    public function store(StoreRequest $req){
        try {
            $data = $req->validated();
            User::create($data);
            return ApiResponse::sendSuccessResponse("Successfully create user", code: 200);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error suddenly occurred", $th->getMessage());
        }
    }
    public function update(UpdateRequest $req, $id){
        try {
            $data = $req->validated();
            $user = User::find($id);

            if (is_null($user->first())) {
                return ApiResponse::sendErrorResponse("Cannot find user with provided id", code: 404);
            }

            $user->update($data);
            return ApiResponse::sendSuccessResponse("Successfully update user", code: 200);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error suddenly occurred", $th->getMessage());
        }
    }
    public function destroy($id){
        try {
            $user = User::find($id);

            if (is_null($user)) {
                return ApiResponse::sendErrorResponse("Cannot find user with provided id", code: 404);
            }

            $user->delete();
            return ApiResponse::sendSuccessResponse("Successfully delete user", code: 200);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("Error suddenly occurred", $th->getMessage());
        }
    }
}
