<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Peoples\CreateAction;
use App\Actions\Peoples\DeleteAction;
use App\Actions\Peoples\UpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Peoples\CreateRequest;
use App\Http\Requests\Admin\Peoples\UpdateRequest;
use App\Http\Resources\Admin\PeopleResource;
use App\Models\People;
use App\Models\Quote;
use App\Repositories\PeoplesRepository;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PeoplesController extends Controller
{
    public function getPeoples(PeoplesRepository $repository): AnonymousResourceCollection
    {
        $peoples = $repository->getPeoples();

        return PeopleResource::collection($peoples);
    }

    public function getPeople(People $people): PeopleResource
    {
        $people->load([
            'country',
            'quotes' => fn(HasMany $builder) => $builder->orderByDesc('id')
        ]);

        return new PeopleResource($people);
    }

    public function create(CreateRequest $request, CreateAction $action): PeopleResource
    {
        $people = $action->run($request);

        return new PeopleResource($people);
    }

    public function update(UpdateRequest $request, UpdateAction $action, People $people): JsonResponse
    {
        $success = $action->run($people, $request);

        return $this->json(compact('success'));
    }

    public function delete(DeleteAction $action, Quote $quote): JsonResponse
    {
        $success = $action->run($quote);

        return $this->json(compact('success'));
    }
}
