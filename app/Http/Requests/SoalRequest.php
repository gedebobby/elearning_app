<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoalRequest extends FormRequest
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
            'soal' => 'required',
            'opsi_a' => 'required',
            'opsi_b' => 'required',
            'opsi_c' => 'required',
            'opsi_d' => 'required',
            'kunci_jawaban' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'soal.required' => 'Soal Wajib Diisi',
            'opsi_a.required' => 'Opsi A Wajib diisi',
            'opsi_b.required' => 'Opsi B Wajib diisi',
            'opsi_c.required' => 'Opsi C Wajib diisi',
            'opsi_d.required' => 'Opsi D Wajib diisi',
            'kunci_jawaban.required' => 'Kunci Jawaban Wajib diisi'
        ];
    }
}
