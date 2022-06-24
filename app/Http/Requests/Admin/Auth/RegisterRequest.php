<?php

namespace App\Http\Requests\Admin\Auth;

use App\Http\Requests\ApiRequest;
use Hash;

class RegisterRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];
    }

    public function data(): array
    {
        return [
            'name'     => $this->get('name'),
            'email'    => $this->get('email'),
            'password' => Hash::make($this->get('password'))
        ];
    }
}
