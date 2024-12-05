<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['message' => 'User fetch successfully', 'data' => $users], 200);
    }

    public function show(User $user)
    {
        return response()->json(['message' => 'User fetch successfully', 'data' => $user], 200);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json(['message' => 'User updated successfully'], 201);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], 201);
    }

    public function role($role)
    {
        $users = User::where('role', $role)->get();
        return response()->json(['message' => 'User role fetch successfully', 'data' => $users], 200);
    }
}
