<?php

namespace App\Repositories\Views;
use App\Classes\ApiResponse;
use App\Interfaces\Views\DashboardInterface;
use App\Models\Booking;
use DB;

class DashboardRepository implements DashboardInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function status()
    {
        try {
            // Define the statuses we're interested in
            $statuses = ['apr', 'rej', 'new'];

            // Get the count of each specified status
            $statusCounts = Booking::select('status', DB::raw('count(*) as total'))
                ->whereIn('status', $statuses)
                ->groupBy('status')
                ->get();

            // Convert the collection to an associative array for easier access
            $counts = [
                'apr' => 0,
                'rej' => 0,
                'new' => 0,
            ];

            foreach ($statusCounts as $statusCount) {
                $counts[$statusCount->status] = $statusCount->total;
            }

            return ApiResponse::sendSuccessResponse("Successfully retrieved booking status counts", $counts);
        } catch (\Throwable $th) {
            return ApiResponse::sendErrorResponse("An error occurred", $th->getMessage());
        }
    }


    public function mostUsedDriver(){
        $driver = Booking::select("id_driver", DB::raw("count(*) as total"))->groupBy("id_driver")->orderByDesc("total")->with("user")->first();
        return response()->json([
            "status" => true,
            "message" => "Success",
            "data" => $driver
        ]);
    }
    public function mostOftenUser(){
        $user = Booking::select("id_user", DB::raw("count(*) as total"))->groupBy("id_user")->orderByDesc("total")->with("user")->first();
        return response()->json([
            "status" => true,
            "message" => "Success",
            "data" => $user
        ]);
    }
    public function mostUsedVehicle(){
        $vehicle = Booking::select("id_vehicle", DB::raw("count(*) as total"))->groupBy("id_vehicle")->orderByDesc("total")->with("vehicle")->first();
        return response()->json([
            "status" => true,
            "message" => "Success",
            "data" => $vehicle
        ]);
    }
    public function totalByPeriod($period){
        $query = Booking::select(DB::raw("count(*) as total"));

        switch ($period) {
            case 'today':
                $query->whereDate("created_at", now()->toDateString());
                break;
            case 'weekly':
                $query->whereDate("created_at", ">=", now()->startOfWeek());
                break;
            case 'monthly':
                $query->whereDate("created_at", ">=", now()->startOfMonth());
                break;
            case "yearly":
                $query->whereDate("created_at", ">=", now()->startOfYear());
                break;
            default:
                "no";
                break;
        }

        $total = $query->first();
        return response()->json([
            "status" => true,
            "message" => "Success",
            "data" => $total
        ]);
    }
    public function farthest(){
        $book = Booking::select('id_booking', DB::raw('ST_Distance_Sphere(point(from_lon, from_lat), point(to_lon, to_lat)) AS distance'))->orderBy('distance', 'desc')->first();
        return response()->json([
            "status" => true,
            "message" => "Success",
            "data" => $book
        ]);
    }
}
