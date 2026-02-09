<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEtudiantValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            // Informations de l’élève
            'nom'            => 'required|string|max:255',
            'prenom'         => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'sexe'           => 'required|in:Masculin,Féminin',
            'niveau'         => 'required|in:Maternelle,Primaire,Collège,Lycée',

            // Informations du parent
            'parent_nom'     => 'required|string|max:255',
            'telephone'      => 'required|string|max:20',
            'email'          => 'nullable|email',
            'adresse'        => 'nullable|string',

            // Informations d’inscription
            'annee_scolaire' => 'required|string',
        ];
    }

    /**
     * Custom error messages
     */
    public function messages(): array
    {
        return [
            'nom.required'            => 'Le nom est obligatoire.',
            'prenom.required'         => 'Le prénom est obligatoire.',
            'date_naissance.required' => 'La date de naissance est obligatoire.',
            'sexe.required'           => 'Le sexe est obligatoire.',
            'niveau.required'         => 'Le niveau scolaire est obligatoire.',
            'parent_nom.required'     => 'Le nom du parent est obligatoire.',
            'telephone.required'      => 'Le numéro de téléphone est obligatoire.',
            'email.email'             => 'Veuillez entrer une adresse email valide.',
        ];
    }
}
