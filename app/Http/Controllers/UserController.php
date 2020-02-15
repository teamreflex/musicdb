<?php

namespace App\Http\Controllers;

use App\Models\OwnedItem;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
        $user = User::with('collection.collectable')->where('username', '=', $username)->first();

        return $this->response->json([
            'data' => $user,
        ]);
    }

    /**
     * Add an item to the collection.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function addToCollection(Request $request): JsonResponse
    {
        $item = OwnedItem::create(array_merge($request->all(), ['user_id' => $request->user()->id]));

        return $this->response->json([
            'data' => $item,
        ]);
    }
}
