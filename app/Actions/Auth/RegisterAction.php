<?php

namespace App\Actions\Auth;

use App\Http\Requests\Admin\Auth\RegisterRequest;
use App\Models\User;

class RegisterAction
{
    private RegisterRequest $request;

    public function __construct(RegisterRequest $request)
    {
        $this->request = $request;
    }

    public function run(): string
    {
        $user = User::create($this->request->data());

        return $this->makeToken($user);
    }

    private function makeToken(User $user): string
    {
        return $user->createToken('auth_token')->plainTextToken;
    }
}
