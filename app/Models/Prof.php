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
    'telephone',
    'email',
    'adresse',
    'cours_id',
    ];

    // علاقة: الأستاذ لديه عدة دروس
    public function cours()
    {
        return $this->hasMany(Cour::class, 'prof_id');
    }
}