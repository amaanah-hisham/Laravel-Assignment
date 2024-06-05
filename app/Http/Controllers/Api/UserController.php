<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers(Request $request){
        $users = User::orderBy('name','ASC')->get();

        return response()->json([
            'users' => $users,
        ]);
    }

}
