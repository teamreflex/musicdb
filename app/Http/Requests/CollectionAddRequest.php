<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectionAddRequest extends FormRequest
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
            'collectable_type' => ['required'],
            'collectable_id' => ['required', 'integer'],
            'amount' => ['sometimes'],
            'is_signed' => ['sometimes'],
            'is_promo' => ['sometimes'],
            'acquired_at' => ['sometimes'],
        ];
    }
}
