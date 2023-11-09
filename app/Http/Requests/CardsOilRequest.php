<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardsOilRequest extends FormRequest
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
            'date_of_oil' => 'date',
            'oil_hours' => 'numeric|max:255'
        ];
    }
    public function messages()
    {
        return [
            'date' => 'هذا الحقل يجب ان يكون تاريخ',
            'numeric' => 'هذا الحقل يجب ان يكون ارقام',
            'max' => 'هذا الحقل يجب ان لا يزيد عن 255 رقم'
        ];
    }
}
