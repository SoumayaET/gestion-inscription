<?php

namespace App\Http\Controllers;
use App\Models\Prof;

use App\Http\Requests\CreateProfValidationReques;
use Illuminate\Http\Request;

class ProfsController extends Controller
{
    public function index(){
        // $data = prof::all();
        // return view('profs', ['data'=>$data]);
        return view('profs');
    }
    public function create(){
        
        return view('ajouterProf');
    }
    public function store(CreateProfValidationReques $request)
    
{
    $exists = Prof::where('nom', $request->nom)
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
    $prof = new Prof();
    
    // Informations de l’élève
    $prof->nom            = $data['nom'];
    $prof->prenom         = $data['prenom'];
    $prof->date_naissance = $data['date_naissance'];
    $prof->sexe           = $data['sexe'];
    $prof->niveau         = $data['niveau'];

    // Informations du parent
    $prof->parent_nom     = $data['parent_nom'];
    $prof->telephone      = $data['telephone'];
    $prof->email          = $data['email'] ?? null;
    $prof->adresse        = $data['adresse'] ?? null;

    // Informations d’inscription
    $prof->annee_scolaire = $data['annee_scolaire'];

    // Gestion ducdocument/photo
    if ($request->hasFile('document')) {
        $file = $request->file('document');
        $filename = time().'_'.$file->getClientOriginalName();
        $path = $file->storeAs('documents', $filename, 'public');
        $prof->document_path = $path;
    }

    // Sauvegarder l'étudiant
    $prof->save();

    // Redirection avec message de succès
    return back()->with('success', 'Étudiant ajouté avec succès !');
}
    public function edit(){
        
        return view('enroll');
    }
}
