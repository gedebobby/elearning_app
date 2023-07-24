<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuruRequest extends FormRequest
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
            'nama_guru' => 'required|string',
            'nip' => 'required',
            'role_guru' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_guru.required' => 'Nama Guru Wajib Diisi',
            'nama_guru.string' => 'Nama Guru harus Berupa Huruf',
            'nip.required' => 'NIP Wajib diisi',
            'role_guru.required' => 'Role Guru Wajib Dipilih'
        ];
    }
}
