<?php

namespace App\Repositories;

use App\Models\People;
use Illuminate\Pagination\LengthAwarePaginator;

class PeoplesRepository
{
    public function getPeoples(): LengthAwarePaginator
    {
        return People::orderByDesc('id')->paginate(request('limit', 10));
    }
}
