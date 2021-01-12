<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KehadiranRequest extends FormRequest
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
            'semester_id' => 'required',
            'kelas_id' => 'required',
            'siswa_id' => 'required',
            'sakit' => 'required',
            'izin' => 'required',
            'tanpa_keterangan' => 'required',
        ];
    }
}
