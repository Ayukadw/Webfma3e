<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        if ($request->password !== $user->password_hash) {
            return response()->json(['message' => 'Password salah'], 401);
        }

        // Bisa generate token di sini jika menggunakan auth
        return response()->json([
            'message' => 'Login berhasil',
            'user'    => $user
        ], 200);
    }
}
