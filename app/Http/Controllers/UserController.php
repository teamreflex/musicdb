<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected array $profileRelations = [
        'collection.collectable',
        'favoriteArtist',
        'favoriteAlbum',
        'favoriteMember',
    ];

    /**
     * Return the current user.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function current(Request $request): JsonResponse
    {
        return $this->response->json([
            'data' => $request->user(),
        ]);
    }

    /**
     * Find a user by their username.
     *
     * @param Request $request
     * @param string $username
     * @return JsonResponse
     */
    public function profile(Request $request, string $username): JsonResponse
    {
        $user = User::with($this->profileRelations)->where('username', '=', $username)->first();

        return $this->response->json([
            'data' => $user,
        ]);
    }

    /**
     * Update the user profile.
     *
     * @param UserUpdateRequest $request
     * @return JsonResponse
     */
    public function update(UserUpdateRequest $request): JsonResponse
    {
        $user = $request->user();
        $user->fill($request->validated());
        $user->save();

        return $this->response->json([
            'data' => $user,
        ]);
    }
}
