<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFactoryRequest extends FormRequest
{
    /**
     * Визначає, чи авторизований користувач.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Правила валідації.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:factories,name,' . $this->factory->id,
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
