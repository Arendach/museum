<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Peoples\CreateRequest;
use App\Http\Requests\Admin\Peoples\UpdateRequest;
use App\Http\Resources\Admin\PeopleResource;
use App\Repositories\PeoplesRepository;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PeoplesController extends AdminController
{
    protected string $resource = PeopleResource::class;
    protected string $repository = PeoplesRepository::class;
    protected string $storeRequest = CreateRequest::class;
    protected string $updateRequest = UpdateRequest::class;
    protected bool $isPagination = true;

    public function with(): array
    {
        return [
            'country',
            'quotes' => fn(HasMany $builder) => $builder->orderByDesc('id'),
            'picture',
        ];
    }
}
