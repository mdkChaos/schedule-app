<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkshopRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:workshops,name,' . $this->route('workshop')->id,
            'factory_id' => 'required|exists:factories,id',
        ];
    }

    /**
     * Повідомлення про помилки.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Workshop name is required.',
            'name.unique' => __('message.this_name_already_exists'),
            'factory_id.required' => 'Factory is required.',
            'factory_id.exists' => 'Factory must exist in the factories table.',
        ];
    }
}
