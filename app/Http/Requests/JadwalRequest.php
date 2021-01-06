<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JadwalRequest extends FormRequest
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
            'hari' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'guru_id' => 'required'
        ];
    }
}
