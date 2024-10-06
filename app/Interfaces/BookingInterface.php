<?php

namespace App\Interfaces;

use App\Http\Requests\Booking\StoreRequest;
use App\Http\Requests\Booking\UpdateRequest;

interface BookingInterface
{
    public function index();
    public function show(int $id);
    public function store(StoreRequest $req);
    public function update(UpdateRequest $req, int $id);
    public function destroy(int $id);
}
