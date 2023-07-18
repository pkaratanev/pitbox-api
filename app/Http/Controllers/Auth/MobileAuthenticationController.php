<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class MobileAuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response([
            'user' => $user,
            'apiKey' => $this->generateToken($user)
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        if ($request->password !== $request->confirm_password) {
            throw ValidationException::withMessages([
                'confirm_password' => ['The passwords don\'t match.'],
            ]);
        }

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $this->generateToken($user);
    }

    protected function generateToken(User $user)
    {
        return $user->createToken($user->email)->plainTextToken;
    }
}
