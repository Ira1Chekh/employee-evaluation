<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'correctness' => ['required', 'integer', 'min:1', 'max:10'],
            'initiative' => ['required', 'integer', 'min:1', 'max:10'],
            'comment' => ['nullable', 'string'],
        ];
    }
}
