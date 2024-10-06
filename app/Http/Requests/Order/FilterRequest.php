<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'dua_date' => 'date',
            'manager' => 'string',
            'order_type' => 'string',
            'device_type' => 'string',
            'device' => 'string',
            'issue' => 'string',
            // 'contractor_id' => '',
            // 'user_id' => '',
            'amount' => '',
        ];
    }
}
