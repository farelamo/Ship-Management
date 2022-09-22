<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidator extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fname'        => 'required|max:100',
            'lname'        => 'required|max:100',
            'email'        => 'email|required|unique:users,email',
            'password'     => 'required|max:8',
        ];
    }

    public function messages()
    {
        return [
            'fname.required'        => 'nama depan tidak boleh kosong',
            'fname.max'             => 'maximal panjang nama depan 100 character',
            'lname.required'        => 'nama belakang tidak boleh kosong',
            'lname.max'             => 'maximal panjang nama belakang 100 character',
            'email.required'        => 'email tidak boleh kosong',
            'email.email'           => 'format email salah',
            'email.unique'          => 'email sudah digunakan',
            'password.required'     => 'password tidak boleh kosong',
            'password.max'          => 'maximal panjang password hanya 8 character',
        ];
    }
}
