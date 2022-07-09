<?php

namespace App\Http\Requests\Admin\Users;

use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rule;
use Hash;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'email'    => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->route('id'))
            ],
            'name'     => 'required|min:2|max:255',
            'password' => 'nullable|min:8|confirmed',
        ];
    }

    public function getData(): array
    {
        if ($this->get('password')) {
            $password = Hash::make($this->get('password'));

            return $this->only('name', 'email') + compact('password');
        }

        return $this->only('name', 'email');
    }
}
