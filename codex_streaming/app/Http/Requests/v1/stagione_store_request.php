<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class stagione_store_request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'id_serie' => 'integer',
            'titolo' => 'required|string|max:255',
            'totale_episodi' => 'integer',
            'id_locandina' => 'integer',
        ];
    }
}
