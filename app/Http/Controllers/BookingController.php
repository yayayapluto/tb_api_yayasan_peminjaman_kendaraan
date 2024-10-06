<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\StoreRequest;
use App\Http\Requests\Booking\UpdateRequest;
use App\Interfaces\BookingInterface;

class BookingController extends Controller
{
    private BookingInterface $bookingInterface;

    public function __construct(BookingInterface $bookingInterface)
    {
        $this->bookingInterface = $bookingInterface;
    }

    public function index()
    {
        return $this->bookingInterface->index();
    }

    public function show(int $id)
    {
        return $this->bookingInterface->show($id);
    }

    public function store(StoreRequest $req)
    {
        return $this->bookingInterface->store($req);
    }

    public function update(UpdateRequest $req, int $id)
    {
        return $this->bookingInterface->update($req, $id);
    }

    public function destroy(int $id)
    {
        return $this->bookingInterface->destroy($id);
    }
}
