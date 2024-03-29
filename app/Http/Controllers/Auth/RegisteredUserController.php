<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string','min:3', 'max:10'],
            'lastname' => ['required', 'string','min:3', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:visitors'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'date_of_birth' =>['required'],
            'gender' =>['required'],
        ]);

        $user = Visitor::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'mobile' => $request->mobile,
            'firstname' => $request->firstname,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
