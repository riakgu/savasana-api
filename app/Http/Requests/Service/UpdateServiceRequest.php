<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'name' =>  ['sometimes', 'required', 'string', 'max:255'],
            'description' =>  ['sometimes', 'nullable', 'string', 'max:500'],
            'duration' =>  ['sometimes', 'required', 'integer'],
            'price' =>  ['sometimes', 'required', 'integer'],
            'target' => ['sometimes', 'required', 'in:mom,baby,toddler,kid,all'],
            'is_active' =>  ['sometimes', 'nullable', 'boolean'],
        ];
    }
}
