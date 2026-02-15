<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cour;

class mesCoursController extends Controller
{
    public function index()
    {
        // جلب الدروس الخاصة بالأستاذ الحالي فقط
        $cours = Cour::where('prof_id', auth()->id())->get();

        return view('mesCours', compact('cours'));
    }
}