<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:60'],
            'middlename' => ['required', 'string', 'max:60'],
            'lastname' => ['required', 'string', 'max:60'],
            'login' => ['required', 'string', 'max:60', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:60', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
            'tel' => ['required', 'string', 'max:20','unique:'.User::class],
        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,  
            'lastname' => $request->lastname,
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tel' => $request->tel,
            'role' => "user",
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
