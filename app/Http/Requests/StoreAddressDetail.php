<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressDetail extends FormRequest
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
            'member_id' => 'nullable|exists:members',
            'business_id' => 'nullable|exists:businesses',
            'employer_id' => 'nullable|exists:employers',
            'county_id' => 'required|exists:counties',
            'constituency_id' => 'required|exists:constituencies',
            'locality_id' => 'required|exists:localities',
            'postal_address' => 'nullable',
            'post_office_id' => 'nullable|exists:post_offices',
            'street' => 'nullable',
            'building_name' => 'nullable',
            'floor' => 'nullable',
            'house_number' => 'nullable'
        ];
    }
}
