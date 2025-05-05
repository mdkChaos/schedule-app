<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCellRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:cells,name,' . $this->cell->id,
            'department_id' => 'required|exists:departments,id',
        ];
    }

    /**
     * Повідомлення про помилки.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Cell name is required.',
            'name.unique' => __('message.this_name_already_exists'),
            'department_id.required' => 'Department is required.',
            'department_id.exists' => 'Department must exist in the departments table.',
        ];
    }
}
