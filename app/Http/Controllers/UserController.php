<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public $userService;
    public function __construct()
    {
        $this->userService = new UserService;
    }

    public function index() {
        return $this->userService->indexPage();
    }

    public function create() {
        return $this->userService->createPage();
    }

    public function store(UserCreateRequest $request) {
       return $this->userService->createUser($request->all());
    }

    public function edit($id) {
        return $this->userService->editPage($id);
    }

    public function update(UserUpdateRequest $request) {
        return $this->userService->updateUser($request);
    }

    public function show($id) {
        return $this->userService->showPage($id);
    }

    public function destroy($id) {
        return $this->userService->deleteUser($id);
    }
}
