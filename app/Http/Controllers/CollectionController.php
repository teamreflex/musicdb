<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectionAddRequest;
use App\Models\OwnedItem;
use App\Services\Collection\CollectionServiceContract;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;

class CollectionController extends Controller
{
    /**
     * @var CollectionServiceContract
     */
    protected CollectionServiceContract $service;

    /**
     * UserController constructor.
     * @param ResponseFactory $response
     * @param CollectionServiceContract $service
     */
    public function __construct(ResponseFactory $response, CollectionServiceContract $service)
    {
        parent::__construct($response);

        $this->service = $service;
    }

    /**
     * Add an item to the collection.
     *
     * @param CollectionAddRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function add(CollectionAddRequest $request): JsonResponse
    {
        $this->authorize('create', OwnedItem::class);

        $item = $this->service->add(
            $request->user(),
            $request->get('collectable_type'),
            $request->get('collectable_id'),
            $request->validated(),
        );

        return $this->response->json([
            'data' => $item,
        ]);
    }

    /**
     * Remove an item from the collection.
     *
     * @param Request $request
     * @param OwnedItem $ownedItem
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function remove(Request $request, OwnedItem $ownedItem): JsonResponse
    {
        $this->authorize('delete', $ownedItem);

        return $this->response->json([
            'data' => $this->service->remove($request->user(), $ownedItem),
        ]);
    }
}
