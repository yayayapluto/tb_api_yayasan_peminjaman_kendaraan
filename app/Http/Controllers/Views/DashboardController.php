<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Interfaces\Views\DashboardInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private DashboardInterface $dashboardInterface;

    public function __construct(DashboardInterface $dashboardInterface) {
        $this->dashboardInterface = $dashboardInterface;
    }

    public function status() {
        return $this->dashboardInterface->status();
    }

    public function mostUsedDriver(){
        return $this->dashboardInterface->mostUsedDriver();
    }
    public function mostOftenUser(){
        return $this->dashboardInterface->mostOftenUser();
    }
    public function mostUsedVehicle(){
        return $this->dashboardInterface->mostUsedVehicle(); 
    }
    public function totalByPeriod($period){
        return $this->dashboardInterface->totalByPeriod($period);
    }
    public function farthest(){
        return $this->dashboardInterface->farthest();
    }
}
