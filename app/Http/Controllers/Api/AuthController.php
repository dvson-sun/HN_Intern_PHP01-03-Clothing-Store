<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function login(LoginRequest $request)
    {
        try {
            if ($request->validator->fails()) {
                return response([
                    'error' => $request->validator->errors(),
                ], 422);
            }
            $user = $this->userRepo->findUserByEmail($request->email);

            if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ])) {
                $token = $user->createToken('authToken')->plainTextToken;

                return response()->json([
                    'status_code' => 200,
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                ]);
            }

            return response()->json([
                'status_code' => 500,
                'message' => __('login-fail'),
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage(),
            ]);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => __('logout'),
        ], 200);
    }
}
