<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;

    // اسم الجدول
    protected $table = 'cours';

    // الحقول القابلة للتعبئة
    protected $fillable = [
        'titre',
        'niveau',
        'prof_id',
        'date_debut',
        'date_fin',
        'salle'
    ];

    // علاقة: الدرس ينتمي إلى أستاذ واحد
    public function prof()
    {
        return $this->belongsTo(Prof::class, 'prof_id');
    }
}