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
            'nip' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'mapel_id' => 'required',
            'hp' => 'required',
            'jenjang_pendidikan' => 'required',
        ];
    }
}
