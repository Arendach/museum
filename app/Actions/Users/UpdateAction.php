<?php

namespace App\Actions\Users;

use App\Http\Requests\Admin\Articles\UpdateRequest;
use App\Models\User;

class UpdateAction
{
    public function run(User $user, UpdateRequest $request): bool
    {
        $user->update(
            $request->getData()
        );

        return true;
    }
}
