<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);


        $user = User::where('email', $request->get('email'))->first();

        if ($user) {
            return response()->json(['message' => 'User with this email exist.'])->status(409);
        }


    }
}
