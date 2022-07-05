<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Weapons\StoreAction;
use App\Actions\Weapons\UpdateAction;
use App\Http\Requests\Admin\Weapons\StoreRequest;
use App\Http\Requests\Admin\Weapons\UpdateRequest;
use App\Http\Resources\Admin\WeaponResource;
use App\Repositories\Admin\WeaponsRepository;

class WeaponsController extends AdminController
{
    protected string $repository = WeaponsRepository::class;
    protected string $resource = WeaponResource::class;
    protected string $storeRequest = StoreRequest::class;
    protected string $storeAction = StoreAction::class;
    protected string $updateAction = UpdateAction::class;
    protected string $updateRequest = UpdateRequest::class;
    protected array $with = ['countries', 'picture', 'videos', 'seo'];
}
