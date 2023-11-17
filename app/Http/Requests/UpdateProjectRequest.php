<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::id() === 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'title' => ['required', 'bail', 'min:3', 'max:200', Rule::unique('projects')->ignore($this->project)],
            'cover_image' => 'nullable|image|max:300',
            'content' => 'nullable|bail|min:3|max:500',
            'type_id' => ['nullable', 'exists:types,id'],
            'technologies' => ['nullable', 'exists:technologies,id'],
            'github' => 'nullable|bail|min:3|max:2048',
            'website' => 'nullable|bail|min:3|max:2048'

        ];
    }
}
