<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RenterController extends Controller
{
    public function renterRegistrationForm()
    {
        return view('renter-registration');

    }

    public function renterRegistration(Request $request)
    {

//        dd($request->all());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'checkbox' => 'required|string',
        ]);

//        $validated['role'] = 8;
        $validated['password'] = bcrypt($request->password);

        $user = User::create($validated);
        $user->assignRole('Renter');

        Auth::login($user);

        return redirect()->route('product.create')->with('success', 'You Renter account has been successfully created!');
    }
}
