<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (User::where('email', $request->email)->exists()) {
            return response()->json(['message' => 'Email already exists'], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'Registration successful'], 200);
    }


    public function login(Request $request)
    {


        if (!User::where('email', $request->email)->exists()) {
            return response()->json(['message' => 'Email not found'], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid password'], 422);
        }
        $user->status = 'active';
        $user->save();
        $token = $user->createToken('authToken' . $user->id)->plainTextToken;
        return response()->json(['message' => 'Login successful', 'access_token' => $token, 'data' => $user], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logout successful'], 200);
    }

    public function session(Request $request)
    {
        if ($request->header('Authorization') == null) {
            return response()->json(['message' => 'Invalid session'], 422);
        }

        if (!Auth::guard('sanctum')->check()) {
            return response()->json(['message' => 'Session not accepted'], 422);
        }

        return response()->json(['message' => 'Session accepted'], 200);
    }
}
