<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{

    public function rules()
    {
        return [
          'email' => 'required|string|email',
          'password' => 'required|string',
        ];
    }

    public function authorize()
    {
        return true;
    }

}
