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
        'user_id' // ✅ أضفنا هذا الحقل
    ];

    // العلاقة مع جدول users
    public function user()
{
    return $this->belongsTo(User::class);
}


}