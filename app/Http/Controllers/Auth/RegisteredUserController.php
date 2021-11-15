<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendLoginMail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create($token, $name, $email)
    {
        return view('auth.register', ['token' => $token, 'name' => $name, 'email' => $email]);
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
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'admins' => ['nullable']
        ]);

        // If admins is null, set it to false
        if(is_null($request->get('admins'))) {
            $validated['admins'] = false;
        }
        else {
            $validated['admins'] = true;
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'admins' => $validated['admins']
        ]);

        event(new Registered($user));

        $params = $request->all();
        Mail::to($request->get('email'))
            ->send(new SendLoginMail($params));

        return redirect(RouteServiceProvider::HOME);
    }
}
