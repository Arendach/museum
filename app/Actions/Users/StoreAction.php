<?php

namespace App\Actions\Users;

use App\Http\Requests\Admin\Users\StoreRequest;
use App\Models\User;

class StoreAction
{
    public function run(StoreRequest $request): User
    {
        return User::create($request->getData());
    }
}
