<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMoyenStockageRequest extends FormRequest
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
        $operation_paysane_id = auth()->user()->operation_paysane_id;

        return [
            'libelle' => 'required|string|max:255',
            'capacite' => 'required|integer',
            'etat_observation' => 'required|string|max:255',
            'annee_acquisition' => 'required',
            'mode_acquisition_id' => 'required|string',
            'operation_paysane_id' => 'required|in:' . $operation_paysane_id,
        ];
    }

    public function messages()
    {
        return [
            'libelle.required' => 'Le champ intitulé est requis.',
            'capacite.required' => 'Le champ capacité est requis.',
            'etat_observation.required' => 'Le champ état d\'observation est requis.',
            'annee_acquisition.required' => 'Le champ année d\'acquisition est requis.',
            'mode_acquisition_id.required' => 'Le champ mode d\'acquisition est requis.',
            'operation_paysane_id.in' => 'La valeur de l\'attribut operation_paysane_id ne correspond pas à celle de l\'utilisateur connecté.',
        ];
    }
}
