<?php

namespace TeamReflex\AddAlbum;

use App\Services\Spotify\SpotifyServiceContract;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AddAlbumController extends Controller
{
    /**
     * @var ResponseFactory
     */
    protected ResponseFactory $response;

    /**
     * @var SpotifyServiceContract
     */
    protected SpotifyServiceContract $spotify;

    /**
     * AddAlbumController constructor.
     * @param ResponseFactory $response
     * @param SpotifyServiceContract $spotify
     */
    public function __construct(ResponseFactory $response, SpotifyServiceContract $spotify)
    {
        $this->response = $response;
        $this->spotify = $spotify;
    }

    /**
     * Add or update an album from Spotify.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function spotify(Request $request): JsonResponse
    {
        if ($spotify = $request->get('spotify_id')) {
            return $this->response->json([
                'data' => $this->spotify->addAlbum($spotify),
            ]);
        }

        return $this->response->json([
            'message' => 'Invalid Spotify ID',
        ]);
    }
}
