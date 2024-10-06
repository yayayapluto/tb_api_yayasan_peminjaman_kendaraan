<?php

namespace App\Interfaces;

use App\Http\Requests\Vehicle\StoreRequest;
use App\Http\Requests\Vehicle\UpdateRequest;

interface VehicleInterface
{
    public function index();
    public function show(int $id);
    public function search(string $query);
    public function store(StoreRequest $req);
    public function update(UpdateRequest $req, int $id);
    public function destroy(int $id);
}
