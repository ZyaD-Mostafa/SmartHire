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
        'phone' => ['required', 'regex:/^01[0-2,5]{1}[0-9]{8}$/'],
        'secPhone' => ['nullable', 'regex:/^01[0-2,5]{1}[0-9]{8}$/'],
        'national_id' => ['required', 'digits:14'],
        'address' => 'required|string|max:255',
        'dob' => 'required|date',
        'grad_year' => ['required', 'digits:4', 'integer', 'min:1950', 'max:' . date('Y')],
        'university' => 'required|string|max:255',
        'degree' => 'required|string|max:255',
        'cv' => 'required|file|mimes:pdf,doc,docx,txt,odt,rtf|max:2048',
    ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
   
}
