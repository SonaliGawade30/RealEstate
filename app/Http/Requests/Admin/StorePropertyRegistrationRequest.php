<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePropertyRegistrationRequest extends FormRequest
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
            'property_type_id' => 'required',
            'property_no' => 'required|unique:property_registrations,property_no',
            'old_property_no' => 'required',
            'property_name' => 'required',
            'property_address' => 'required',
            'mauja' => 'required',
            'sheet_no' => 'required',
            'plot_no' => 'required',
            'area' => 'required',
            'ready_reckoner_rate' => 'required',
            'valuation' => 'required',
            'source_id' => 'required',
            'date_of_acquisition' => 'required',
            'remark' => 'required',
            'latitude' =>  'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'property_photo_upload'=> 'nullable|mimes:jpeg,jpg,png,pdf',
            'dp_plan_upload'=> 'nullable|mimes:jpeg,jpg,png,pdf',
            'unit_type' => ['required', Rule::in(['one_unit', 'multiple_units'])],
            'property_reg_id'=> 'nullable',
            'unit_no' => 'required', // Adjust the rule according to your needs
            'area_filed' => 'nullable',
            'floor' => 'nullable|',
            'type_of_use_id' => 'nullable',
            'estate_id' => 'nullable',
            'lease_rent' => 'nullable',
            'document' => 'nullable',
        ];
    }
}
