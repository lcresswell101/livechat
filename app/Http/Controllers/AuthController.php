<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        // Hash Password
        $request['password'] = Hash::make($request->input('password'));

        User::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'register success'
        ], Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if($token = Auth::guard()->attempt($credentials))
        {
            return response()->json([
                'status' => 'success'
            ], Response::HTTP_OK)
            ->header('Authorization', $token);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'login error',
            'errors' => [
                'email' => [
                    'email or password incorrect'
                ]
            ]
        ], Response::HTTP_UNAUTHORIZED);
    }
}
