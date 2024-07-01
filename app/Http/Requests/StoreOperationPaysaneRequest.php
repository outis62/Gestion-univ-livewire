<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOperationPaysaneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'libelle' => 'required',
            'rccm_ninea' => 'required',
            'statut_juridique'=> 'required',
            'siege'=>'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email'=> 'required',
            'role'=>'required',  
        ];
    }
}