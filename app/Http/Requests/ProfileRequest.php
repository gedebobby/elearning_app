<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'oldPassword' => 'required|min:8',
            'newPassword' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'oldPassword.required' => 'Password Lama Wajib diisi',
            'oldPassword.required' => 'Password Baru Wajib diisi',
            'newPassword.min' => 'Password minimal 8 karakter',
            'newPassword.min' => 'Password minimal 8 karakter',
        ];
    }
}
