<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class episodio_store_request extends FormRequest
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
            'id_serie' => 'integer|exists:serie,id_serie',
            'numero_stagione' => 'integer',
            'numero_episodio' => 'integer',
            'titolo' => 'required|string|max:255',
            'descrizione' => 'required|string',
            'durata' => 'required|integer',
            'anno' => 'nullable|integer',
            'id_video_episodio' => 'required|integer'
        ];
    }
}
