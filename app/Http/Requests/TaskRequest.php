<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'assigned_to' => 'required|exists:users,id',
            'status' => 'nullable|in:Pending,In Progress,Completed',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Task title is required.',
            'description.required' => 'Task description is required.',
            'start_date.required' => 'Start date is required.',
            'start_date.date' => 'Start date must be a valid date.',
            'end_date.required' => 'End date is required.',
            'end_date.date' => 'End date must be a valid date.',
            'assigned_to.required' => 'Please assign this task to a user.',
            'assigned_to.exists' => 'Selected user does not exist.',
            'status.in' => 'Status must be either Pending, In Progress, or Completed.',
        ];
    }
}
