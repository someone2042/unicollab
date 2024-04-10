<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }
    public function store(Request $request)
    {
        $formFeild = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);
        $formFeild['password'] = bcrypt($formFeild['password']);

        $user = User::create($formFeild);
        event(new Registered($user));

        auth()->login($user);
        return redirect('/email/verify');
    }
}
