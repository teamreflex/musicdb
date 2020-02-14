<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberStoreRequest;
use App\Http\Requests\MemberUpdateRequest;
use App\Models\Member;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index(): JsonResponse
    {
        $this->authorize('viewAny', Member::class);

        return $this->response->json([
            'data' => Member::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MemberStoreRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(MemberStoreRequest $request): JsonResponse
    {
        $this->authorize('create', Member::class);

        return $this->response->json([
            'data' => Member::create($request->validated()),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Member $member
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function show(Member $member): JsonResponse
    {
        $this->authorize('view', $member);

        return $this->response->json([
            'data' => $member,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MemberUpdateRequest $request
     * @param Member $member
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(MemberUpdateRequest $request, Member $member): JsonResponse
    {
        $this->authorize('update', $member);

        $member->fill($request->validated());
        $member->save();

        return $this->response->json([
            'data' => $member,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Member $member
     * @return JsonResponse
     * @throws AuthorizationException
     * @throws Exception
     */
    public function destroy(Member $member): JsonResponse
    {
        $this->authorize('delete', $member);

        return $this->response->json([
            'data' => $member->delete(),
        ]);
    }
}
