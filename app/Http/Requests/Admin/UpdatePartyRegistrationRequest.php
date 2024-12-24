<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartyRegistrationRequest extends FormRequest
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
            'edit_party_name' => 'required',
            'edit_buisness_name' => 'required',
            'edit_address' => 'required',
            'edit_email' => 'required',
            'edit_mobile_no' => 'required|numeric|digits:10',
            'edit_pancard_no' => [
                'required',
                'regex:/^[A-Z]{5}[0-9]{4}[A-Z]$/'
            ],
            'edit_aadhaar_no' => 'required|numeric|digits:12',
            'edit_gst_no' => 'required',
            'edit_upload_document' => 'nullable', 
        ];
    }
}
