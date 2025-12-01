<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
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
            'customer_id' => ['sometimes', 'required', 'exists:customers,id'],
            'client_id' => ['sometimes', 'required', 'exists:clients,id'],
            'service_id' => ['sometimes', 'required', 'exists:services,id,is_active,1'],
            'booking_date' => ['sometimes', 'required', 'date'],
            'booking_time' => ['sometimes', 'required', 'date_format:H:i'],
            'status' => ['sometimes', 'nullable', 'in:pending,completed,cancelled'],
            'total_price' => ['sometimes', 'required', 'numeric', 'min:0'],
            'payment_status' => ['sometimes', 'nullable', 'in:unpaid,paid'],
            'payment_method' => ['sometimes', 'nullable', 'in:cash,transfer'],
            'notes' => ['sometimes', 'nullable', 'string', 'max:255'],
        ];
    }
}
