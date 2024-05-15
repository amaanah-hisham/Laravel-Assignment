<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('Ewave')->plainTextToken;

            return response()->json([
                'token' => $token,
                'success' => "User login successfully!",
            ]);
        } else {
            return response()->json([
                            'error' => 'Unauthorized'
                            ], 401);

        }


    }
}
