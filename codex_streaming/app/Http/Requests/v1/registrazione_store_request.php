<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class registrazione_store_request extends FormRequest
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
            'codice_fiscale' => 'required|string|max:45',
            'partita_iva' => 'string|max:45',
            'cittadinanza' => 'required|string|max:45',
            'citta_nascita' => 'required|string|max:45',
            'provincia_nascita' => 'required|string|max:45',
            'data_nascita' => 'required|date',
            'id_stato_utente' =>  'integer',
            'password' => [
            'required',
            'string',
            'min:8',
            'confirmed',
            'regex:/[a-z]/',
            'regex:/[A-Z]/',
            'regex:/[0-9]/',
            'regex:/[@$!%*#?&]/',
        ],
            'email' => [
            'required',
            'string',
            'min:8',
            'email',
            'max:255',
            'confirmed',
            'unique:recapiti,recapito',
            'regex:/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,6}$/',
        ],
        ];
    }
}
