<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class contatto_store_request extends FormRequest
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
            'nome' => 'required|string|max:45',
            'cognome' => 'required|string|max:45',
            'sesso' => 'in:0,1',
            'codice_fiscale' => 'string|max:45',
            'partita_iva' => 'string|max:45',
            'cittadinanza' => 'string|max:45',
            'citta_nascita' => 'string|max:45',
            'provincia_nascita' => 'string|max:45',
            'data_nascita' => 'date',
            'id_stato_utente' =>  'integer'
        ];
    }
}
