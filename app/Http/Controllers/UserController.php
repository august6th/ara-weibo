<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signUp()
    {
        return view('users.sign_up');
    }

    public function show(User $user)
    {
        $compact = compact('user');

        return view('users.show', $compact);
    }
}
