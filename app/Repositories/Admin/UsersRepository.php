<?php

namespace App\Repositories\Admin;

use App\Models\User;

class UsersRepository extends AdminRepository
{
    protected string $model = User::class;
}
