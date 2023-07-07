<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UjianRequest extends FormRequest
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
            'nama_ujian' => 'required|string',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'tgl_mulai' => 'required',
            'waktu_mulai' => 'required',
            'waktu' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_ujian.required' => 'Nama Ujian Wajib Diisi',
            'nama_ujian.string' => 'Harus Berupa Huruf',
            'id_mapel.required' => 'Mapel Wajib Diisi',
            'id_kelas.required' => 'Kelas Wajib Diisi',
            'tgl_mulai.required' => 'Tanggal Mulai Wajib Diisi',
            'waktu_mulai.required' => 'Mapel Wajib Diisi',
            'waktu.required' => 'Waktu Wajib Diisi'
        ];
    }
}
