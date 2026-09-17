<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'task_name' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'type_id' => ['nullable', 'exists:types,id'],
            'status_id' => ['required', 'exists:statuses,id'],
            'real_time' => ['nullable', 'integer', 'min:0'],
            'estimated_time' => ['nullable', 'integer', 'min:0'],
            'priority' => ['nullable', 'string'],
            'responsible_user_id' => ['nullable', 'exists:user,id'],
            'deadline_at' => ['nullable', 'date'],
            'schedule' => ['nullable', 'string'],
        ];
    }
}
