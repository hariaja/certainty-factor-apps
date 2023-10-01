<?php

namespace App\Http\Requests\Consoles\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SymptomRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'code' => [
        'required', 'string', 'regex:/^G\d+(,G\d+)*$/',
        Rule::unique('symptoms', 'code')->ignore($this->symptom)
      ],
      'description' => [
        'required', 'string',
        Rule::unique('symptoms', 'description')->ignore($this->symptom)
      ],
      'point' => 'required|numeric',
      'disturbance' => 'required|regex:/^P\d+(,P\d+)*$/',
    ];
  }

  /**
   * Get the error messages for the defined validation rules.
   */
  public function messages(): array
  {
    return [
      '*.required' => ':attribute harus tidak boleh dikosongkan',
      '*.max' => ':attribute maksimal :max karakter',
      '*.min' => ':attribute maksimal :min karakter',
      '*.in' => ':attribute harus salah satu dari jenis berikut: :values',
      '*.unique' => ':attribute sudah digunakan, silahkan pilih yang lain',
      '*.exists' => ':attribute tidak ditemukan atau tidak bisa diubah',
      '*.numeric' => ':attribute input tidak valid atau harus berupa angka',
      '*.image' => ':attribute tidak valid, pastikan memilih gambar',
      '*.mimes' => ':attribute tidak valid, masukkan gambar dengan format jpg atau png',
      'code.regex' => ':attribute harus berupa "G1, G2, dst..."',
      'disturbance.regex' => ':attribute harus berupa "P1, P2, dst..."',
    ];
  }

  /**
   * Get the validation attribute names that apply to the request.
   *
   * @return array<string, string>
   */
  public function attributes(): array
  {
    return [
      'code' => 'Kode',
      'description' => 'Deskripsi',
      'point' => 'Nilai CF',
      'disturbance' => 'Gejala',
    ];
  }
}
