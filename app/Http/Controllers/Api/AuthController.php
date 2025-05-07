<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AuthRequest;
use App\Http\Resources\AuthResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class AuthController
{

    public function login(AuthRequest $request): AuthResource|JsonResponse
    {
        try {
            $credentials = $request->validated();

            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
            $user = \auth()->user();
            $user->token = $token;
            return (new AuthResource($user))->additional([
                'success' => true,
                'message' => 'Login successful',
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), (array)__METHOD__);
            return response()->json(['message' => 'something went wrong']);
        }

    }
}
