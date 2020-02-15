<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotocardStoreRequest;
use App\Http\Requests\PhotocardUpdateRequest;
use App\Models\Photocard;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class PhotocardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index(): JsonResponse
    {
        $this->authorize('viewAny', Photocard::class);

        return $this->response->json([
            'data' => Photocard::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PhotocardStoreRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(PhotocardStoreRequest $request): JsonResponse
    {
        $this->authorize('create', Photocard::class);

        return $this->response->json([
            'data' => Photocard::create($request->validated()),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Photocard $photocard
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function show(Photocard $photocard): JsonResponse
    {
        $this->authorize('view', $photocard);

        return $this->response->json([
            'data' => $photocard,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PhotocardUpdateRequest $request
     * @param Photocard $photocard
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(PhotocardUpdateRequest $request, Photocard $photocard): JsonResponse
    {
        $this->authorize('update', $photocard);

        $photocard->fill($request->validated());
        $photocard->save();

        return $this->response->json([
            'data' => $photocard,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Photocard $photocard
     * @return JsonResponse
     * @throws AuthorizationException
     * @throws Exception
     */
    public function destroy(Photocard $photocard): JsonResponse
    {
        $this->authorize('delete', $photocard);

        return $this->response->json([
            'data' => $photocard->delete(),
        ]);
    }
}
