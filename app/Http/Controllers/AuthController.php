<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function loginView()
    {
        return view('auth.index');
    }

    public function loginMethod(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('afterlogin.home');
        }

        return back()->withErrors(['Login failed! Please check your credentials.']);
    }


    public function registerMethod(Request $request)
    {
        $request->validate([
            'username1' => 'required|unique:users,username',
            'first_name' => 'required|string|max:255',
            'surname1' => 'nullable|string|max:255',
            'dob' => 'required|date',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gender' => 'required|in:male,female,other',
            'hobbies' => 'nullable|array',
            'newpassword' => 'required|min:6',
            'confirmpassword' => 'same:newpassword'
        ]);

        $profilePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePath = $request->file('profile_picture')->store('profiles', 'public');
        }

        $user = User::create([
            'username' => $request->username1,
            'first_name' => $request->first_name,
            'surname' => $request->surname1,
            'dob' => $request->dob,
            'profile_picture' => $profilePath,
            'gender' => $request->gender,
            'hobbies' => json_encode($request->hobbies),
            'password' => Hash::make($request->newpassword),
        ]);

        if (!$user) {
            return back()->withErrors(['Registration failed! Please try again.']);
        }

        Auth::login($user);

        if (Auth::check()) {
            return redirect()->route('afterlogin.home')->with('success', 'Registration successful!');
        }
    }
}
