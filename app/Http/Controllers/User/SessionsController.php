<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\Login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class SessionsController extends Controller
{
    public function store(Login $request)
    {
        if (!Auth::attempt($request->validated())) {
            session()->flash('errors', new MessageBag(['Password is not correct!']));
            return redirect()->back()->withInput();
        }

        session()->flash('green', 'Welcome back!');
        return redirect()->route('users.show', Auth::user());
    }

    public function destroy()
    {

    }
}
