<?php

namespace App\Http\Requests;

use App\Enums\ProjectImportanceEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'importance' => ['required', Rule::in(ProjectImportanceEnum::toValues())],
            'users' => ['nullable', 'array'],
            'users.*' => ['required', 'exists:users,id']
        ];
    }
}
