<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTugasRequest extends FormRequest
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
            'file_name' => 'required|mimes:csv,txt,xlsx,pdf,doc,docx,rar,zip,ppt,pptx|nullable'
        ];
    }

    public function messages()
    {
        return [
            'file_name.required' => 'File Wajib Diisi',
            'file_name.mimes' => 'File Tugas harus berupa dokumen'
        ];
    }
}
