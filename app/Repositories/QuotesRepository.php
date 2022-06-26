<?php

namespace App\Repositories;

use App\Models\Quote;
use App\Repositories\Admin\AdminRepository;

class QuotesRepository extends AdminRepository
{
    protected string $model = Quote::class;
}
