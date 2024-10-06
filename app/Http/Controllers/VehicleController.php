<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vehicle\StoreRequest;
use App\Http\Requests\Vehicle\UpdateRequest;
use App\Interfaces\VehicleInterface;

class VehicleController extends Controller
{
    private VehicleInterface $vehicleInterface;

    public function __construct(VehicleInterface $vehicleInterface)
    {
        $this->vehicleInterface = $vehicleInterface;
    }

    public function index()
    {
        return $this->vehicleInterface->index();
    }

    public function show(int $id)
    {
        return $this->vehicleInterface->show($id);
    }

    public function search(string $query)
    {
        return $this->vehicleInterface->search($query);
    }

    public function store(StoreRequest $req)
    {
        return $this->vehicleInterface->store($req);
    }

    public function update(UpdateRequest $req, int $id)
    {
        return $this->vehicleInterface->update($req, $id);
    }

    public function destroy(int $id)
    {
        return $this->vehicleInterface->destroy($id);
    }
}
