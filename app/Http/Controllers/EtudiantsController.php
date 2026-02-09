<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEtudiantValidationRequest;
use App\Models\Etudiant;

use Illuminate\Http\Request;

class EtudiantsController extends Controller
{
    public function index(){
        $data = Etudiant::all();
        return view('etudiants', ['data'=>$data]);
    }
    public function create(){
        
        return view('enroll');
    }
    public function store(CreateEtudiantValidationRequest $request)
    
{
    $exists = Etudiant::where('nom', $request->nom)
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
    $etudiant = new Etudiant();
    
    // Informations de l’élève
    $etudiant->nom            = $data['nom'];
    $etudiant->prenom         = $data['prenom'];
    $etudiant->date_naissance = $data['date_naissance'];
    $etudiant->sexe           = $data['sexe'];
    $etudiant->niveau         = $data['niveau'];

    // Informations du parent
    $etudiant->parent_nom     = $data['parent_nom'];
    $etudiant->telephone      = $data['telephone'];
    $etudiant->email          = $data['email'] ?? null;
    $etudiant->adresse        = $data['adresse'] ?? null;

    // Informations d’inscription
    $etudiant->annee_scolaire = $data['annee_scolaire'];

    // Gestion du document/photo
    if ($request->hasFile('document')) {
        $file = $request->file('document');
        $filename = time().'_'.$file->getClientOriginalName();
        $path = $file->storeAs('documents', $filename, 'public');
        $etudiant->document_path = $path;
    }

    // Sauvegarder l'étudiant
    $etudiant->save();

    // Redirection avec message de succès
    return back()->with('success', 'Étudiant ajouté avec succès !');
}
    public function edit(){
        
        return view('enroll');
    }
    public function create(){
        
        return view('enroll');
    }
}
