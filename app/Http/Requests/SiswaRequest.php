<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
            'nama_siswa' => 'required|string',
            'nis' => 'required|min:3',
            'id_kelas' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_siswa.required' => 'Nama Siswa Wajib Diisi',
            'nama_siswa.string' => 'Nama Siswa harus Berupa Huruf',
            'nis.required' => 'NIS Wajib diisi',
            'nis.min' => 'NIS Minimal 3 karakter',
            'id_kelas.required' => 'Kelas Wajib diisi'
        ];
    }
}
