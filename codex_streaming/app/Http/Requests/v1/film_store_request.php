<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class film_store_request extends FormRequest
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
            'id_categoria' => 'integer',
            'titolo' => 'required|string|max:255',
            'descrizione' => 'string',
            'durata' => 'required|integer|min:1',
            'regista' => 'string|max:45',
            'attori' => 'string|max:255',
            'anno' => 'integer',
            'id_locandina' => 'integer',
            'id_video_film' => 'integer',
            'id_trailer' => 'integer'
        ];

    }
}
