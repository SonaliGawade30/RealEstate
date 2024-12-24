<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationForRentalPropertyRequest extends FormRequest
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
            'zone_id' => 'required',
            'allotment_no' => 'required',
            'party_id' => 'required',
            'caste' => 'required',
            'shared' => 'required',
            'nature_of_buisness' => 'required',
            'type_of_allotment' => 'required',
            'contract_duration' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'rent_per_month' => 'required',
            'rent_increase' => 'required',
            'rent_increase_type' => 'required',
            'increament_increase' => 'required',
            'rule_id' => 'required',
            'biling_type_id' => 'required',
            'deposite' => 'required',
            'agrement_file_upload' => 'required|mimes:png,jpg,jpeg,pdf',
            'deposit' => 'required',
        ];
    }
}
