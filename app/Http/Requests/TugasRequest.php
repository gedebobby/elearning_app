<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TugasRequest extends FormRequest
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
            'nama_tugas' => 'required',
            'id_kelas' => 'required',
            'id_mapel' => 'required',
            // 'id_guru' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'file_tugas' => 'mimes:csv,txt,xlsx,pdf,doc,docx,rar,zip,ppt,pptx|nullable'
        ];
    }

    public function messages()
    {
        return [
            'nama_tugas.required' => 'Nama Tugas Wajib Diisi',
            'id_kelas.required' => 'Pilih kelas',
            'id_mapel.required' => 'Pilih Mata Pelajaran',
            'keterangan.required' => 'Keterangan Wajib Diisi',
            'tanggal.required' => 'Pilih Tanggal Deadaline',
            'waktu.required' => 'Pilih Waktu Deadline'
        ];
    }
}
