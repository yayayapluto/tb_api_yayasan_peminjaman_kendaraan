<?php

namespace App\Http\Controllers;

use App\Http\Requests\Notification\StoreRequest;
use App\Http\Requests\Notification\UpdateRequest;
use App\Interfaces\NotificationInterface;

class NotificationController extends Controller
{
    private NotificationInterface $notificationInterface;

    public function __construct(NotificationInterface $notificationInterface)
    {
        $this->notificationInterface = $notificationInterface;
    }

    public function index()
    {
        return $this->notificationInterface->index();
    }

    public function show(int $id)
    {
        return $this->notificationInterface->show($id);
    }

    public function store(StoreRequest $req)
    {
        return $this->notificationInterface->store($req);
    }

    public function update(UpdateRequest $req, int $id)
    {
        return $this->notificationInterface->update($req, $id);
    }

    public function destroy(int $id)
    {
        return $this->notificationInterface->destroy($id);
    }
}
