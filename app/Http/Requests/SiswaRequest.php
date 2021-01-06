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
            'nis' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'nama_orang_tua' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'kelas_id' => 'required',
            'ekskul_id' => 'required',
            'hp' => 'required',
            'alamat' => 'required',
        ];
    }
}
