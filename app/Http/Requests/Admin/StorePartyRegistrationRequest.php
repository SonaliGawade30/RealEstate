<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePartyRegistrationRequest extends FormRequest
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
            'party_name' => 'required',
            'buisness_name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'mobile_no' => 'required|numeric|digits:10',
            'pancard_no' => [
                'required',
                'regex:/^[A-Z]{5}[0-9]{4}[A-Z]$/'
            ],
            'aadhaar_no' => 'required|numeric|digits:12',
            'gst_no' => 'required',
            'upload_document' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ];
    }
}
