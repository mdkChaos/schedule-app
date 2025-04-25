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
        // За потреби заміни на перевірку ролі або policy
        return true;
    }

    /**
     * Правила валідації.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:factories,name,' . $this->route('factory')->id,
        ];
    }

    /**
     * Кастомні назви полів.
     */
    public function attributes(): array
    {
        return [
            'name' => 'Factory name',
        ];
    }

    /**
     * Повідомлення про помилки.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Factory name is required.',
            'name.unique' => 'Factory with this name already exists.',
        ];
    }
}
