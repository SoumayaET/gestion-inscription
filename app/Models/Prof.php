<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prof extends Model
{
    use HasFactory;

    // اسم الجدول
    protected $table = 'profs';

    // الحقول القابلة للتعبئة
    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'sexe',
        'cour',
        'telephone',
        'email',
        'adresse',
        'annee_scolaire',
        
    ];
}