<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    $rules = [
      'name' => 'required|string|max:50',
      'email' => [
        'required', 'email',
        Rule::unique('users', 'email'),
      ],
      'phone' => [
        'required', 'numeric', 'min:12',
        Rule::unique('clients', 'phone'),
      ],
      'occupation' => 'required|string|max:30',
      'gender' => 'required|string',
      'date_of_birth' => 'required|date',
      'place_of_birth' => 'required|string',
      'password' => 'required|string|min:8|confirmed',
      'file' => 'nullable|mimes:jpg,png|max:3048',
    ];

    return $rules;
  }

  /**
   * Get the error messages for the defined validation rules.
   *
   */
  public function messages(): array
  {
    return [
      '*.required' => ':attribute tidak boleh dikosongkan',
      '*.numeric' => ':attribute tidak valid',
      '*.string' => ':attribute tidak valid, masukkan yang benar',
      '*.max' => ':attribute terlalu panjang, maksimal :max karakter',
      '*.unique' => ':attribute sudah digunakan, silahkan pilih yang lain',
      '*.min' => ':attribute terlalu pendek, minimal :min karakter',
      '*.email' => ':attribute tidak valid, masukkan yang benar',
      '*.confirmed' => ':attribute konfimasi tidak sama',
      '*.image' => ':attribute tidak valid, pastikan memilih gambar',
      '*.mimes' => ':attribute tidak valid, masukkan gambar dengan format jpg atau png',
      '*.max' => ':attribute terlalu besar, maksimal :max kb',
      '*.date' => ':attribute harus berupa tanggal',
    ];
  }

  /**
   * Get custom attributes for validator errors.
   *
   */
  public function attributes(): array
  {
    return [
      'name' => 'Nama',
      'email' => 'Email',
      'phone' => 'Nomor Telepon',
      'gender' => 'Jenis Kelamin',
      'file' => 'Avatar',
      'password' => 'Kata Sandi',
      'date_of_birth' => 'Tanggal Lahir',
      'place_of_birth' => 'Tempat Lahir',
      'occupation' => 'Pekerjaan',
    ];
  }
}
