@extends('layouts.app')

@section('PageTitle')
  <li class="current">Modifier les informations</li>
@endsection

@section('contenu')

<main class="main">

<section id="edit-student" class="enroll section">
<div class="container" data-aos="fade-up" data-aos-delay="100">

    {{-- Messages --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="row">
    <div class="col-lg-8 mx-auto">
    <div class="enrollment-form-wrapper">

        <div class="enrollment-header text-center mb-5">
            <h2>Modifier vos informations</h2>
            <p>Vous pouvez mettre à jour vos informations personnelles et d’inscription ci-dessous.</p>
        </div>

        <form class="enrollment-form"
              action="{{ route('etudiants.update', $data->id) }}"
              method="POST">
            @csrf
            

            {{-- ========================= --}}
            {{-- Informations de l’élève --}}
            {{-- ========================= --}}
            <h3>Informations de l’élève</h3>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Nom *</label>
                        <input type="text" name="nom"
                               class="form-control"
                               value="{{ old('nom', $data->nom) }}">
                        @error('nom')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Prénom *</label>
                        <input type="text" name="prenom"
                               class="form-control"
                               value="{{ old('prenom', $data->prenom) }}">
                        @error('prenom')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Date de naissance *</label>
                        <input type="date" name="date_naissance"
                               class="form-control"
                               value="{{ old('date_naissance', $data->date_naissance) }}">
                        @error('date_naissance')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Sexe *</label>
                        <select name="sexe" class="form-select">
                            <option value="">Sélectionner</option>
                            <option value="Masculin"
                                {{ old('sexe', $data->sexe) == 'Masculin' ? 'selected' : '' }}>
                                Masculin
                            </option>
                            <option value="Féminin"
                                {{ old('sexe', $data->sexe) == 'Féminin' ? 'selected' : '' }}>
                                Féminin
                            </option>
                        </select>
                        @error('sexe')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- 🔥 Nouveau champ Niveau --}}
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Niveau *</label>
                        <select name="niveau" class="form-select">
                            <option value="">Sélectionner</option>

                            <option value="Primaire"
                                {{ old('niveau', $data->niveau) == 'Primaire' ? 'selected' : '' }}>
                                Primaire
                            </option>

                            <option value="Collège"
                                {{ old('niveau', $data->niveau) == 'Collège' ? 'selected' : '' }}>
                                Collège
                            </option>

                            <option value="Lycée"
                                {{ old('niveau', $data->niveau) == 'Lycée' ? 'selected' : '' }}>
                                Lycée
                            </option>

                            <option value="Université"
                                {{ old('niveau', $data->niveau) == 'Université' ? 'selected' : '' }}>
                                Université
                            </option>
                        </select>

                        @error('niveau')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- ========================= --}}
            {{-- Informations du parent --}}
            {{-- ========================= --}}
            <h3>Informations du parent</h3>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Nom du parent *</label>
                        <input type="text" name="parent_nom"
                               class="form-control"
                               value="{{ old('parent_nom', $data->parent_nom) }}">
                        @error('parent_nom')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Téléphone *</label>
                        <input type="tel" name="telephone"
                               class="form-control"
                               value="{{ old('telephone', $data->telephone) }}">
                        @error('telephone')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email"
                               class="form-control"
                               value="{{ old('email', $data->email) }}">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Adresse</label>
                        <textarea name="adresse"
                                  class="form-control">{{ old('adresse', $data->adresse) }}</textarea>
                        @error('adresse')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-enroll">
                        Enregistrer les modifications
                    </button>
                </div>
            </div>

        </form>

    </div>
    </div>
    </div>

</div>
</section>

</main>

@endsection
