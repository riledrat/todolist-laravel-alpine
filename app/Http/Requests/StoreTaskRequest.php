<?php

    declare(strict_types=1);

    namespace App\Http\Requests;

    class StoreTaskRequest extends \Illuminate\Foundation\Http\FormRequest
    {
        public function authorize(): bool
        {
            return true;
        }

        public function rules(): array
        {
            return [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'priority' => 'required|in:Normal,Minor,Critical',
                'assigned_to' => 'nullable|exists:users,id',
            ];
        }
    }
