<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAppRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string|max:40',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'secPhone' => 'string|max:20',
            'national_id' => 'required|string',
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
            'grad_year' => 'required|string|max:4',
            'university' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'cv' => 'required|file|mimes:pdf,doc,docx,txt,odt,rtf|max:2048'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Full Name',
            'email' => 'Email Address',
            'phone' => 'Phone Number',
            'secPhone' => 'Secondary Phone Number',
            'national_id' => 'National ID',
            'address' => 'Address',
            'dob' => 'Date of Birth',
            'grad_year' => 'Graduation Year',
            'university' => 'University/College',
            'degree' => 'Degree Major',
            'cv' => 'CV',
        ];
    }
}
