<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'artist_id' => ['required', 'integer'],
            'subunit_id' => ['sometimes', 'integer'],
            'name_en' => ['required'],
            'name_kr' => ['sometimes'],
            'description' => ['sometimes'],
            'spotify_id' => ['sometimes'],
            'spotify_image' => ['sometimes'],
            'cover_art' => ['sometimes'],
            'album_image' => ['sometimes'],
            'release_date' => ['sometimes'],
            'version' => ['sometimes'],
            'primary_version' => ['sometimes'],
        ];
    }
}
