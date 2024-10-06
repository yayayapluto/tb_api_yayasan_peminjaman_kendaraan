<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserInterface $userInterface;

    public function __construct(UserInterface $userInterface) {
        $this->userInterface = $userInterface;
    }

    public function index(){
        return $this->userInterface->index();
    }
    public function show(int $id){
        return $this->userInterface->show($id);
    }
    public function search(string $query){
        return $this->userInterface->search($query);
    }
    public function store(StoreRequest $req){
        return $this->userInterface->store($req);
    }
    public function update(UpdateRequest $req, int $id){
        return $this->userInterface->update($req, $id);
    }
    public function destroy(int $id){
        return $this->userInterface->destroy($id);
    }
}
