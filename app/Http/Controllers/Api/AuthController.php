<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Util\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponse;

    public function login(Request $request)
    {
        $validated = $request->validate([
            'identity' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $validated['identity'])
            ->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return $this->respondBad([
                'data' => [],
                'message' => __('app.The given data was invalid!'),
            ]);
        }

        return $this->respondOk([
            'data' => [
                'token' => $user->createToken(time())->plainTextToken,
                'user' => UserResource::make($user),
            ],
            'message' => null,
        ]);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user->tokens()->delete()) {
            return $this->respondOk([
                'data' => [],
                'message' => __('app.You are logged out!'),
            ]);
        }

        return $this->respondForbidden([
            'data' => [],
            'message' => __('app.User is not logged in or invalid token provided!'),
        ]);
    }
}
