<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourValidationReques extends FormRequest
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
            'titre'       => 'required|string|max:255',
            'niveau'      => 'required|string|max:255',
            'prof_id'     => 'required|exists:profs,id',
            'date_debut'  => 'required|date',
            'date_fin'    => 'required|date|after:date_debut',
            'salle'       => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'titre.required'      => 'Le titre du cours est obligatoire.',
            'niveau.required'     => 'Le niveau est obligatoire.',
            'prof_id.required'    => 'Le professeur est obligatoire.',
            'prof_id.exists'      => 'Le professeur sélectionné n’existe pas.',
            'date_debut.required' => 'La date de début est obligatoire.',
            'date_fin.required'   => 'La date de fin est obligatoire.',
            'date_fin.after'      => 'La date de fin doit être postérieure à la date de début.',
            'salle.required'      => 'La salle est obligatoire.',
        ];
    }
}
