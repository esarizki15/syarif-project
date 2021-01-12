<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SemesterRequest extends FormRequest
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
            'kode_semester'=>'required',
            'nama_semester'=>'required',
            'nama_tahun_ajar'=>'required',
            'nama_tahun_pelajaran'=>'required',
            'semester' => 'required'
        ];
    }
}
