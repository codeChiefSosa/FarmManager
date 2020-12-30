<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);
        return view(
            'users.index',
            [
                'user' => $user,
            ]
        );
    }
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }
}
