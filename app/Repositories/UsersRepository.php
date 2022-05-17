<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UsersRepository
{
    public function getUser(int $id): Builder|Model|User|null
    {
        return User::with('articles')->first();
    }
}
