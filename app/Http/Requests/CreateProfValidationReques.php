<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateProfValidationReques extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
         'nom'       => 'required|string|max:255',
        'prenom'    => 'required|string|max:255',
        'telephone' => 'nullable|string|max:20',

        'email' => [
            'required',
            'email',
            Rule::unique('profs','email')->ignore($this->route('id')),
        ],

        'adresse'   => 'nullable|string',
        'cours_id'  => 'nullable|exists:cours,id',
    ];
}

public function messages(): array
{
    return [
        'nom.required'        => 'Le nom est obligatoire.',
        'prenom.required'     => 'Le prénom est obligatoire.',
        'telephone.string'    => 'Le numéro de téléphone doit être une chaîne de caractères.',
        'email.email'         => 'Veuillez entrer une adresse email valide.',
        'email.unique'        => 'Cette adresse email est déjà utilisée.',
        'cours_id.exists'     => 'Le cours sélectionné n’existe pas.',
    ];
}
}
