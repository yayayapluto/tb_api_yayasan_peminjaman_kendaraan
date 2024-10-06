<?php

namespace App\Interfaces;

use App\Http\Requests\Notification\StoreRequest;
use App\Http\Requests\Notification\UpdateRequest;

interface NotificationInterface
{
    public function index();
    public function show(int $id);
    public function store(StoreRequest $req);
    public function update(UpdateRequest $req, int $id);
    public function destroy(int $id);
}
