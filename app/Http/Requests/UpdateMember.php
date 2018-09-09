<?php
  
  namespace App\Http\Requests;
  
  use Illuminate\Foundation\Http\FormRequest;
  
  class UpdateMember extends FormRequest
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
        'identification_number' => 'nullable|alpha_num',
        'first_name' => 'nullable|alpha_num',
        'last_name' => 'nullable|alpha_num',
        'other_name' => 'nullable|alpha_num',
        'id_file_url' => 'nullable|url',
        'date_of_birth' => 'nullable|date|before:today',
        'phone_number' => 'nullable|numeric',
        'email' => 'nullable|email',
        'password' => 'nullable',
        'kra_pin' => 'nullable|alpha_num',
        'kra_certificate' => 'nullable|url',
        'gender' => 'nullable',
        'passport_photo' => 'nullable|url',
        'marital_status_id' => 'nullable',
        'proposed_monthly_deposit' => 'nullable|numeric'
      ];
    }
  }
