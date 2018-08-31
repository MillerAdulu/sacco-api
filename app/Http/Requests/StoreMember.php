<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMember extends FormRequest
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
            'identification_number' => 'required|alpha_num',
            'first_name' => 'required|alpha_num',
            'last_name' => 'required|alpha_num',
            'other_name' => 'nullable|alpha_num',
            'date_of_birth' => 'required|date|before:today',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
            'proposed_monthly_contribution' => 'required|numeric',
            'kra_pin' => 'nullable',
            'marital_status_id' => 'nullable|integer'
        ];
    }
}
