<?php

namespace App\Services;
use App\Models\User;

class UserService
{
    public function indexPage() {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function createUser($request) {
        User::create($request);

        return redirect()->route('users.index');
    }

    public function createPage(){
        return view('users.create');
    }

    public function editPage($id) {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function updateUser($request) {
        $user = User::find($request->id);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function showPage($id) {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function deleteUser($id) {
        if (auth()->id() == $id) {
            return redirect()->route('users.index')->with('error', 'You cannot delete your own account.');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
