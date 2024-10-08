<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'status' => 'string',
            'due_date' => 'nullable|date',
            'manager' => 'nullable|string',
            'order_type' => 'nullable|string',
            'device_type' => 'nullable|string',
            'device' => 'nullable|string',
            'issue' => 'nullable|string',
            'contractor_id' => '',
            'user_id' => '',
            'user_order_id' => '',
            'amount' => '',
        ];
    }
}
