<?php

namespace App\Repositories\Admin;

use App\Models\Page;

class PagesRepository extends AdminRepository
{
    protected string $model = Page::class;
}
