<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Auth;
use App\Actions\Auth\RegisterAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterAction $action): JsonResponse
    {
        $accessToken = $action->run();

        return $this->json([
            'access_token' => $accessToken,
            'token_type'   => 'Bearer',
        ]);
    }

    public function login(Request $request): JsonResponse
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->json([
                'message' => translate('Введені логін або пароль не вірні')
            ], 401);
        }

        $user = User::where('email', $request->get('email'))->firstOrFail();

        return $this->json([
            'access_token' => $user->createToken('auth_token')->plainTextToken,
            'token_type'   => 'Bearer',
        ]);
    }

    public function me(Request $request): User
    {
        return $request->user();
    }
}
