<?php

namespace App\Http\Requests\Admin\Users;

use App\Http\Requests\ApiRequest;
use Hash;

class StoreRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name'     => 'required|min:2',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function getData(): array
    {
        $password = Hash::make($this->get('password'));

        return $this->only('name', 'email') + compact('password');
    }
}
