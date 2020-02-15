<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubunitUpdateRequest extends FormRequest
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
            'name_en' => ['required'],
            'name_kr' => ['sometimes'],
            'description' => ['sometimes'],
            'twitter' => ['sometimes'],
            'facebook' => ['sometimes'],
            'youtube' => ['sometimes'],
            'instagram' => ['sometimes'],
            'spotify_id' => ['sometimes'],
            'daum' => ['sometimes'],
            'image' => ['sometimes'],
            'spotify_image' => ['sometimes'],
            'logo' => ['sometimes'],
        ];
    }
}
