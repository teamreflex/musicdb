<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumStoreRequest extends FormRequest
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
            'header_url' => ['required'],
            'icon_url' => ['required'],
            'logo_url' => ['required'],
        ];
    }
}
