<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateProfValidationReques;

use App\Models\Prof;
use Illuminate\Http\Request;
use App\Models\Cour;

class ProfsController extends Controller
{
    public function __construct()
{
    $this->middleware(['auth', 'role:admin'])->only(['index','create','store','edit','update','destroy']);
    $this->middleware(['auth', 'role:professeur'])->only(['details']);
}

    // عرض جميع الأساتذة
    public function index()
    {
        $profs = Prof::all();
        // جلب الأساتذة مع الدروس المرتبطة
        return view('profs',['profs'=>$profs]);
    }

    // صفحة إضافة أستاذ جديد
    public function create()
    {   
    $profs = Prof::with('cours')->get(); 
    $cours = Cour::all(); 
    return view('ajouterProf', compact('profs', 'cours'));
    }

    // تخزين أستاذ جديد
    public function store(CreateProfValidationReques $request)
{
    // التحقق من وجود نفس البيانات مسبقًا
    $exists = Prof::where('nom', $request->nom)
        ->where('prenom', $request->prenom)
        ->where('telephone', $request->telephone)
        ->where('email', $request->email)
        ->where('adresse', $request->adresse)
        ->exists();

    if ($exists) {
        return redirect()->back()->with('error', 'Un professeur avec ces informations existe déjà !');
    }

    // نأخذ البيانات validated من الـ FormRequest
    $data = $request->validated();

    // إنشاء نموذج جديد
    $prof = new Prof();
    $prof->nom       = $data['nom'];
    $prof->prenom    = $data['prenom'];
    $prof->telephone = $data['telephone'] ?? null;
    $prof->email     = $data['email'] ?? null;
    $prof->adresse   = $data['adresse'] ?? null;
    $prof->cours_id  = $data['cours_id'] ?? null;
    $prof->save();

    return redirect()->route('profs.index')->with('success', 'Prof ajouté avec succès !');
}

    // صفحة تعديل أستاذ
    public function edit($id)
{
    $prof = Prof::with('cours')->find($id);

    if (!$prof) {
        return redirect()->route('profs.index')
            ->with('error', 'Professeur introuvable.');
    }

    $cours = Cour::all(); // لجلب قائمة الدروس للاختيار

    return view('modifierProfesseur', compact('prof', 'cours'));
}

    // تحديث بيانات أستاذ
   public function update(CreateProfValidationReques $request, $id)
{
    $prof = Prof::find($id);

    if (!$prof) {
        return redirect()->route('profs.index')
            ->with('error', 'Professeur introuvable.');
    }

    $data = $request->validated();

    $prof->update($data);

    return redirect()->route('profs.index')
        ->with('success', 'Professeur modifié avec succès !');
}
    public function destroy($id)
{
    $dataProf = Prof::find($id);

    if (!$dataProf) {
        return redirect()->route('etudiants.index')
            ->with('error', 'Étudiant introuvable.');
    }

    $dataProf->delete();

    return redirect()->route('profs.index')
        ->with('success', 'Professeur supprimé avec succès !');
}

    public function details($id)
{
    $prof = Prof::where('user_id', $id)->first();

    if (!$prof) {
        return redirect()->route('cours.index')
            ->with('error', 'Prof introuvable.');
    }

    return view('profDetails', compact('prof'));
}
}
    

