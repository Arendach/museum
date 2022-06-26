<?php

namespace App\Repositories\Admin;

use App\Models\Tag;

class TagsRepository extends AdminRepository
{
    protected string $model = Tag::class;
}
