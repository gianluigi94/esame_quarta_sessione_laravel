<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class categoria_store_request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }


    public function rules()
    {
        return [
            'categoria' => 'required|string|max:45',
        ];
    }
}
