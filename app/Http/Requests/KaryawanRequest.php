<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KaryawanRequest extends FormRequest
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
            'nama_karyawan' => 'required|min:3|max:50',
            'jk' => 'required|in:L,P',
            'umur_karyawan' => 'required|integer|digits_between:2,3|min:20',
            'pendidikan_karyawan' => 'required|integer|digits_between:1,2',
            'jabatan_karyawan' => 'required|integer|digits_between:1,2',
            'status_karyawan' => 'required|integer|digits_between:1,2',
            'nomor_telepon' => 'required|integer|digits_between:11,15',
        ];
    }
}
