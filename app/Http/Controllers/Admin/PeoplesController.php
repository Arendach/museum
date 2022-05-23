<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Quotes\DeleteAction;
use App\Actions\Quotes\UpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Quotes\UpdateRequest;
use App\Http\Resources\Admin\PeopleResource;
use App\Http\Resources\Admin\QuoteResource;
use App\Models\People;
use App\Models\Quote;
use App\Repositories\PeoplesRepository;
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
        return new PeopleResource($people);
    }

    public function update(UpdateRequest $request, UpdateAction $action, Quote $quote): JsonResponse
    {
        $success = $action->run($quote, $request);

        return $this->json(compact('success'));
    }

    public function delete(DeleteAction $action, Quote $quote): JsonResponse
    {
        $success = $action->run($quote);

        return $this->json(compact('success'));
    }
}
