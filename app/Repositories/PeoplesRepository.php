<?php

namespace App\Repositories;

use App\Models\People;
use App\Repositories\Admin\AdminRepository;

class PeoplesRepository extends AdminRepository
{
    protected string $model = People::class;
}
