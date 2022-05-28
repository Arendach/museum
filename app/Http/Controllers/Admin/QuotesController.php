<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Quotes\CreateAction;
use App\Actions\Quotes\DeleteAction;
use App\Actions\Quotes\UpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Quotes\CreateRequest;
use App\Http\Requests\Admin\Quotes\UpdateRequest;
use App\Http\Resources\Admin\QuoteResource;
use App\Models\Quote;
use App\Repositories\QuotesRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuotesController extends Controller
{
    public function getQuotes(QuotesRepository $repository): AnonymousResourceCollection
    {
        $quotes = $repository->getQuotes();

        return QuoteResource::collection($quotes);
    }

    public function getQuote(Quote $quote): QuoteResource
    {
        $quote->load('people');

        return new QuoteResource($quote);
    }

    public function create(CreateRequest $request, CreateAction $action): QuoteResource
    {
        $quote = $action->run($request);

        return new QuoteResource($quote);
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
