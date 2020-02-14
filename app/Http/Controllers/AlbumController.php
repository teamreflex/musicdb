<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumStoreRequest;
use App\Http\Requests\AlbumUpdateRequest;
use App\Models\Album;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index(): JsonResponse
    {
        $this->authorize('viewAny', Album::class);

        return $this->response->json([
            'data' => Album::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AlbumStoreRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(AlbumStoreRequest $request): JsonResponse
    {
        $this->authorize('create', Album::class);

        return $this->response->json([
            'data' => Album::create($request->validated()),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Album $album
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function show(Album $album): JsonResponse
    {
        $this->authorize('view', $album);

        return $this->response->json([
            'data' => $album,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AlbumUpdateRequest $request
     * @param Album $album
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(AlbumUpdateRequest $request, Album $album): JsonResponse
    {
        $this->authorize('update', $album);

        $album->fill($request->validated());
        $album->save();

        return $this->response->json([
            'data' => $album,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Album $album
     * @return JsonResponse
     * @throws AuthorizationException
     * @throws Exception
     */
    public function destroy(Album $album): JsonResponse
    {
        $this->authorize('delete', $album);

        return $this->response->json([
            'data' => $album->delete(),
        ]);
    }
}
