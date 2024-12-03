<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('auth')->plainTextToken;
            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
            ]);
        } else {
            return response()->json([
                'message' => 'Email or password is incorrect',
                'token' => '-',
            ], 401);
        }
    }

    function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'phone'=> 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $token = $user->createToken('auth')->plainTextToken;

        return response()->json([
            'message' => 'Register successful',
            'token' => $token,
        ]);
    }

    function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout successful',
        ]);
    }

    function auth() {
        $user = User::find(auth()->user()->id);

        return response()->json([
            'message' => 'Data user berhasil diambil',
            'user' => $user,
        ]);
    }
}
