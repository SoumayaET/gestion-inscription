<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourValidationReques;
use App\Models\Cour;

use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function index(){
        // $data = Cour::all();
        // return view('cours', ['data'=>$data]);
        return view('cours');
    }
    public function create(){
        
        return view('ajouterCour');
    }
    public function store(CreateCourValidationReques $request)
    
{
    $exists = Cour::where('nom', $request->nom)
        ->where('prenom', $request->prenom)
        ->where('date_naissance', $request->date_naissance)
        ->where('sexe', $request->sexe)
        ->where('niveau', $request->niveau)
        ->where('parent_nom', $request->parent_nom)
        ->where('telephone', $request->telephone)
        ->exists();

    if ($exists) {
        // إعادة الصفحة مع رسالة خطأ
        return redirect()->back()->with('error', 'Un étudiant avec ces informations existe déjà !');
    }
    // نأخذ البيانات validated من الـ FormRequest
    $data = $request->validated();

    // إنشاء نموذج جديد
    $cour = new Cour();
    
    // Informations de l’élève
    $cour->nom            = $data['nom'];
    $cour->prenom         = $data['prenom'];
    $cour->date_naissance = $data['date_naissance'];
    $cour->sexe           = $data['sexe'];
    $cour->niveau         = $data['niveau'];

    // Informations du parent
    $cour->parent_nom     = $data['parent_nom'];
    $cour->telephone      = $data['telephone'];
    $cour->email          = $data['email'] ?? null;
    $cour->adresse        = $data['adresse'] ?? null;

    // Informations d’inscription
    $cour->annee_scolaire = $data['annee_scolaire'];

    // Gestion ducdocument/photo
    if ($request->hasFile('document')) {
        $file = $request->file('document');
        $filename = time().'_'.$file->getClientOriginalName();
        $path = $file->storeAs('documents', $filename, 'public');
        $cour->document_path = $path;
    }

    // Sauvegarder l'étudiant
    $cour->save();

    // Redirection avec message de succès
    return back()->with('success', 'Étudiant ajouté avec succès !');
}
    public function edit(){
        
        return view('enroll');
    }
    
}
