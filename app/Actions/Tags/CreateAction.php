<?php

namespace App\Actions\Tags;

use App\Http\Requests\Admin\Tags\CreateRequest;
use App\Models\Tag;

class CreateAction
{
    public function run(CreateRequest $request): Tag
    {
        return Tag::create($request->getData());
    }
}
