<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubunitStoreRequest;
use App\Http\Requests\SubunitUpdateRequest;
use App\Models\Subunit;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class SubunitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index(): JsonResponse
    {
        $this->authorize('viewAny', Subunit::class);

        return $this->response->json([
            'data' => Subunit::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubunitStoreRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(SubunitStoreRequest $request): JsonResponse
    {
        $this->authorize('create', Subunit::class);

        return $this->response->json([
            'data' => Subunit::create($request->validated()),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Subunit $subunit
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function show(Subunit $subunit): JsonResponse
    {
        $this->authorize('view', $subunit);

        return $this->response->json([
            'data' => $subunit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SubunitUpdateRequest $request
     * @param Subunit $subunit
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(SubunitUpdateRequest $request, Subunit $subunit): JsonResponse
    {
        $this->authorize('update', $subunit);

        $subunit->fill($request->validated());
        $subunit->save();

        return $this->response->json([
            'data' => $subunit,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subunit $subunit
     * @return JsonResponse
     * @throws AuthorizationException
     * @throws Exception
     */
    public function destroy(Subunit $subunit): JsonResponse
    {
        $this->authorize('delete', $subunit);

        return $this->response->json([
            'data' => $subunit->delete(),
        ]);
    }
}
