<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteFilterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:191',
            'surname' => 'required|max:191',
            'patronymic' => 'required|max:191',
            'email' => 'required|email',
            'photo' => 'array|nullable',
            'photo.*' => 'image|file|mimes:jpg,png,jpeg,gif|max:4096',
            'date_of_birth' => 'nullable',
            'company' => 'nullable',
            'phone' => 'nullable'
        ];
    }
}
