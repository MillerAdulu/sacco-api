<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressDetail extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address_detail_id' => 'required|exists:address_details',
            'member_id' => 'nullable|exists:members',
            'business_id' => 'nullable|exists:businesses',
            'employer_id' => 'nullable|exists:employers',
            'county_id' => 'nullable|exists:counties',
            'constituency_id' => 'nullable|exists:constituencies',
            'locality_id' => 'nullable|exists:localities',
            'postal_address' => 'nullable',
            'post_office_id' => 'nullable|exists:post_offices',
            'street' => 'nullable',
            'building_name' => 'nullable',
            'floor' => 'nullable',
            'house_number' => 'nullable'
        ];
    }
}
