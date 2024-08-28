<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class indirizzo_store_request extends FormRequest
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
    public function rules(): array
{
    return [
       'id_contatto' => 'exists:contatti,id_contatto',
            'nazione' => 'required|string|exists:nazioni,nazione',
            'comune_italiano' => 'string|exists:comuni_italiani,comune',
            'tipo_indirizzo' => 'required|string|exists:tipo_indirizzi,tipo',
            'cap' => 'required|string|max:10',
            'indirizzo' => 'required|string|max:255',
            'civico' => 'required|string|max:10',
    ];
}

}
