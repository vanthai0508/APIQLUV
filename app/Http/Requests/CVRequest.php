<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'position' => 'required',
            'phone' => 'required',
            'file' => ['required', 'image'],

        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Vui long nhap name',
            'position.required' => 'Vui long nhap position',
            'phone.required' => 'Vui long nhap phone'
        ];
    }

     
}