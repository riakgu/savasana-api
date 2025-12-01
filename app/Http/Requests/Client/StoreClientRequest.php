<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'name' =>  ['required', 'string', 'max:255'],
            'type' => ['required', 'in:mom,baby,toddler,kid'],
            'birthdate' =>  ['nullable', 'date'],
            'gender' => ['nullable', 'in:male,female'],
            'notes' => ['nullable', 'string', 'max:255'],
        ];
    }
}
