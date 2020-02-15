<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistStoreRequest;
use App\Http\Requests\ArtistUpdateRequest;
use App\Models\Artist;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index(): JsonResponse
    {
        $this->authorize('viewAny', Artist::class);

        return $this->response->json([
            'data' => Artist::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArtistStoreRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(ArtistStoreRequest $request): JsonResponse
    {
        $this->authorize('create', Artist::class);

        return $this->response->json([
            'data' => Artist::create($request->validated()),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Artist $artist
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function show(Artist $artist): JsonResponse
    {
        $this->authorize('view', $artist);

        return $this->response->json([
            'data' => $artist->load(['albums', 'subunits', 'members']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArtistUpdateRequest $request
     * @param Artist $artist
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(ArtistUpdateRequest $request, Artist $artist): JsonResponse
    {
        $this->authorize('update', $artist);

        $artist->fill($request->validated());
        $artist->save();

        return $this->response->json([
            'data' => $artist,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Artist $artist
     * @return JsonResponse
     * @throws AuthorizationException
     * @throws Exception
     */
    public function destroy(Artist $artist): JsonResponse
    {
        $this->authorize('delete', $artist);

        return $this->response->json([
            'data' => $artist->delete(),
        ]);
    }
}
