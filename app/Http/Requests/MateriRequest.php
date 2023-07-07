<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MateriRequest extends FormRequest
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
            'nama_materi' => 'required|string',
            'id_kelas' => 'required',
            'id_mapel' => 'required',
            // 'id_guru' => 'required',
            'file_materi' => 'mimes:csv,txt,xlsx,pdf,doc,docx,rar,zip,ppt,pptx|nullable',
            'link_materi' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'nama_materi.required' => 'Nama Materi Wajib Diisi',
            'nama_materi.string' => 'Nama Materi harus Berupa Huruf',
            'id_kelas.required' => 'Pilih kelas',
            'id_mapel.required' => 'Pilih Mata Pelajaran',
            'file_materi.mimes' => 'File Materi harus berupa dokumen'
        ];
    }
}
