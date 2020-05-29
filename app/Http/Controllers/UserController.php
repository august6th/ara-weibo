<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Register;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signIn()
    {
        $data = ['is_sign_in' => 1];
        return view('users.user', $data);
    }

    public function signUp()
    {
        $data = ['is_sign_in' => 0];
        return view('users.user', $data);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function store(Register $request)
    {
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
        ]);

        return redirect()->route('users.show', [$user]);
    }
}
