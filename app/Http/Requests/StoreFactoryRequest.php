<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFactoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:factories,name',
        ];
    }

    /**
     * Повідомлення про помилки.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Factory name is required.',
            'name.unique' => __('message.this_name_already_exists'),
        ];
    }
}
