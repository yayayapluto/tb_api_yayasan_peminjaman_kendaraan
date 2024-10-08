<?php

namespace App\Interfaces\Views;

interface DashboardInterface
{
    //
    public function status();
    public function mostUsedDriver();    
    public function mostOftenUser();
    public function mostUsedVehicle();
    public function totalByPeriod($period);
    public function farthest();
}
