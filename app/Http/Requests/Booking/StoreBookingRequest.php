<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'customer_id' => ['required', 'exists:customers,id'],
            'client_id' => ['required', 'exists:clients,id'],
            'service_id' => ['required', 'exists:services,id,is_active,1'],
            'booking_date' => ['required', 'date'],
            'booking_time' => ['required', 'date_format:H:i'],
            'status' => ['nullable', 'in:pending,completed,cancelled'],
            'total_price' => ['required', 'numeric', 'min:0'],
            'payment_status' => ['nullable', 'in:unpaid,paid'],
            'payment_method' => ['nullable', 'in:cash,transfer'],
            'notes' => ['nullable', 'string', 'max:255'],
        ];
    }
}
