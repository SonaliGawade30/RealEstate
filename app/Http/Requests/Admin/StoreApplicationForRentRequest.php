<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationForRentRequest extends FormRequest
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
            'property_reg_id' => 'required',
            'unit_no' => 'required',
            'party_reg_id' => 'required',
            'reason_of_use' => 'required',
            'from_datetime' => 'required',
            'to_datetime' => 'required',
            'remark' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg,pdf',
            'deposit' => 'required',
            'rent' => 'required',
            'discount' => 'required',
            'net_payable' => 'required',
            'cgst' => 'required',
            'sgst' => 'required',
            'actual_amount' => 'required',
        ];
    }
}
