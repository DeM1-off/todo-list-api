<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{

    public function rules()
    {
        return [
          'status' => ['required'],
          'priority' => ['required', 'integer'],
          'title' => ['required','string'],
          'description' => ['required','string'],
        ];
    }

    public function authorize()
    {
        return true;
    }

}
