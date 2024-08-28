<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class transazione_store_request extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'importo' => 'required|string|max:255',
        ];
    }
}
