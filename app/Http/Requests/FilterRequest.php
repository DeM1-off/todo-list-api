<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{

    public function rules()
    {
        return [
          'status' => 'boolean',
          'min_priority' => 'integer',
          'max_priority' => 'integer',
          'title' => 'string',
          'sort_desc' => 'integer',
        ];
    }

    public function authorize()
    {
        return true;
    }

}
