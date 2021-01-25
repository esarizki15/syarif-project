<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WaliKelasRequest extends FormRequest
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
            // 'nip' => 'required',
            // 'nama' => 'required',
            'guru_id' => 'required',
            // 'tempat_lahir' => 'required',
            // 'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kelas_id' => 'required',
            'email' => 'required',
            // 'hp' => 'required',
            'jenjang_pendidikan' => 'required',
        ];
    }
}
