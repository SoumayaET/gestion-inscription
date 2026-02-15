<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourValidationReques;
use App\Http\Requests\CreateCourValidationRequest;
use App\Models\Cour;
use App\Models\Prof;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    // عرض جميع الدروس
    public function index()
    {
        $cours = Cour::with('prof')->get();
        // جلب الدروس مع الأستاذ المرتبط
        return view('cours', ['cours' => $cours]);
    }

    // صفحة إضافة درس جديد
    public function create()
    {
        $profs = Prof::all();
        return view('ajouterCour' ,['profs' => $profs] );
    }

    // تخزين درس جديد
    public function store(CreateCourValidationReques $request)
    {
        // التحقق من البيانات القادمة من الفورم
        $exists = Cour::where('titre', $request->titre)
        ->where('niveau', $request->niveau)
        ->where('prof_id', $request->prof_id)
        ->where('date_debut', $request->date_debut)
        ->where('date_fin', $request->date_fin)
        ->where('salle', $request->salle)
        ->exists();

    if ($exists) {
        // إعادة الصفحة مع رسالة خطأ
        return redirect()->back()->with('error', 'Un cour avec ces informations existe déjà !');
    }
    

    

        // إنشاء درس جديد
        $cour = new Cour();
       $cour->titre      = $request->titre;
    $cour->niveau     = $request->niveau;
    $cour->prof_id    = $request->prof_id;
    $cour->date_debut = $request->date_debut;
    $cour->date_fin   = $request->date_fin;
    $cour->salle      = $request->salle;
   

        $cour->save();


        return back()->with('success', 'Cours ajouté avec succès !');
    }

    // تعديل درس
    public function edit($id)
{
    $cour = Cour::with('prof')->find($id);

    if (!$cour) {
        return redirect()->route('cours.index')
            ->with('error', 'Cours introuvable.');
    }

    $profs = Prof::all(); // لجلب قائمة الأساتذة للاختيار

    return view('modifierCour', compact('cour', 'profs'));
}

    // تحديث درس
   public function update($id,CreateCourValidationReques $request)
    {
        $cour = Cour::find($id);
        if (!$cour) {
            return redirect()->route('cours.index')->with('error', 'Cours introuvable.');
        }

        $cour->update($request->validated());

        return redirect()->route('cours.index')->with('success', 'Cours modifié avec succès !');
    }


    // حذف درس
    public function destroy($id)
{
    $dataCour = Cour::find($id);

    if (!$dataCour) {
        return redirect()->route('etudiants.index')
            ->with('error', 'Étudiant introuvable.');
    }

    $dataCour->delete();

    return redirect()->route('profs.index')
        ->with('success', 'Professeur supprimé avec succès !');
}
    public function details($id)
    {
        $cours = Cour::find($id);

        if (!$cours) {
            return redirect()->route('cours.index')
                ->with('error', 'Cours introuvable.');
        }

         // لجلب قائمة الأساتذة للاختيار

        return view('coursDetails',['cours' =>$cours]);
    }
}