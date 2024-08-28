<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class file_store_request extends FormRequest
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
            'nome' => 'required|string|max:255',
            'percorso' => 'required|string|max:255',
            'dimensione' => 'required|integer|min:1',
            'tipo' => 'required|string|in:video_film,locandina,video_episodio,trailer'
        ];
    }
}
