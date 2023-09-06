<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Register;
use App\Models\VerifyUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
        $existingUsernames = User::pluck('username')->toArray();

        $request->validate(
            [
                'name' => 'required|string|max:255',
                'username' => 'required|string|unique:users|max:255',
                'email' => 'required|email|unique:users|max:255',
                'referral' => 'nullable|string|max:255',
                // 'password' => 'required|string|min:8|confirmed',
                'password' => 'min:6|required_with:cpassword|same:cpassword',
                'cpassword' => 'min:6'
            ],
            [
                'name.required' => 'The name field is required.',
                'username.required' => 'The username field is required.',
                'username.unique' => 'The username has already been taken.',
                'email.required' => 'The email field is required.',
                'email.email' => 'Please provide a valid email address.',
                'email.unique' => 'The email address has already been registered.',
                'password.required' => 'The password field is required.',
                'password.min' => 'The password must be at least 8 characters.',
                'password.confirmed' => 'The password confirmation does not match.',
            ]
        );

        if ($request->referral !== null && !in_array($request->referral, $existingUsernames)) {
            return redirect()->back()->withErrors(['referral' => 'Invalid referral username']);
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'referral' => $request->referral,
            'role' => 1,
            'password' => Hash::make($request->password),
        ]);

        $verifyUser = VerifyUser::create([
            'token' => sha1(time())
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
