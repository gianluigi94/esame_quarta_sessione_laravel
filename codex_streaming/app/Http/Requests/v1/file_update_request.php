<?php

namespace App\Http\Requests\v1;

use App\Helpers\app_helpers;

class file_update_request extends file_store_request
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
       $rules = parent::rules();
       return app_helpers::aggiorna_regole_helpers($rules);
    }
}
