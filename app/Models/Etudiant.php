<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    // اسم الجدول
    protected $table = 'etudiants';

    // الحقول القابلة للتعبئة
    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'sexe',
        'niveau',
        'parent_nom',
        'telephone',
        'email',
        'adresse',
        'annee_scolaire',
        'document_path',
    ];
}