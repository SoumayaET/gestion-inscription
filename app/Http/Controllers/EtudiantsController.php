<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Http\Requests\CreateEtudiantValidationRequest;
use App\Models\Cour;
use App\Models\Etudiant;

use Illuminate\Http\Request;

class EtudiantsController extends Controller
{
    public function __construct()
{
    // المدير والأستاذ يمكنهم رؤية القائمة والتعديل والحذف
    $this->middleware(['auth', 'role:admin,professeur'])->only(['index','destroy','edit','update']);
    
    // الطالب و المدير يمكنهم إضافة طالب جديد ورؤية التفاصيل
    $this->middleware(['auth', 'role:admin,etudiant'])->only(['create','store','details']);
}



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
    
    if ($request->hasFile('document_path')) {
        $file = $request->file('document_path');
        $filename = time() . '_' . Str::random(5) . '.' . $file->extension();

        // يخزن في storage/app/public/etudiants
        $file->storeAs('etudiants', $filename, 'public');

        $etudiant->document_path = 'etudiants/' . $filename;
    }

    // Gestion du document/photo
    // if ($request->hasFile('document')) {
    //     $file = $request->file('document');
    //     $filename = time().'_'.$file->getClientOriginalName();
    //     $path = $file->storeAs('documents', $filename, 'public');
    //     $etudiant->document_path = $path;
    // }

    // Sauvegarder l'étudiant
    $etudiant->save();

    // Redirection avec message de succès
    return redirect()->route('etudiants.index')->with('success', 'Étudiant ajouté avec succès !');
}
    public function edit($id)
        {
            $data = Etudiant::find($id);

            if (!$data) {
                return redirect()->route('etudiants.index')
                    ->with('error', 'Étudiant introuvable.');
            }

            return view('modifierEtudiant', ['data'=>$data]);
        }

        public function update($id, CreateEtudiantValidationRequest $request)
{
    $etudiant = Etudiant::find($id);

    if (!$etudiant) {
        return redirect()->route('etudiants.index')
            ->with('error', 'Étudiant introuvable.');
    }

    $data = $request->validated();

    if (!isset($data['annee_scolaire'])) {
        $data['annee_scolaire'] = $etudiant->annee_scolaire;
    }

    $etudiant->update($data);

    return redirect()->route('etudiants.index')
        ->with('success', 'Étudiant modifié avec succès !');
}
public function destroy($id)
{
    $dataEtud = Etudiant::find($id);

    if (!$dataEtud) {
        return redirect()->route('etudiants.index')
            ->with('error', 'Étudiant introuvable.');
    }

    $dataEtud->delete();

    return redirect()->route('etudiants.index')
        ->with('success', 'Étudiant supprimé avec succès !');
}
    public function details($id)
{
    $etudiant = Etudiant::where('user_id', $id)->first();

    if (!$etudiant) {
        return redirect()->route('etudiants.index')
            ->with('error', 'Étudiant introuvable.');
    }

    return view('etudiantDetails', compact('etudiant'));
}
}
