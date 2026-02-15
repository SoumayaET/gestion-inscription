```php
@extends('layouts.app')
@section('contenu')

<!-- Page Title -->
@section('PageTitle')
  <li class="current">Inscription</li>
@endsection
<!-- End Page Title -->

  <main class="main">

    <!-- Enroll Section -->
    <section id="enroll" class="enroll section">
      
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ session::get('success') }}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-error" role="alert" >
                {{ session::get('error') }}
            </div>
        @endif

        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="enrollment-form-wrapper">

              <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                <h2>Ajouter un nouveau cours</h2>
                <p>Remplissez le formulaire ci-dessous pour créer et enregistrer un nouveau cours dans le système.</p>
              </div>

              <form class="enrollment-form" action="{{ route('cours.store') }}" method="POST" data-aos="fade-up" data-aos-delay="300">
    @csrf

    <h3>Informations du cours</h3>

    <!-- Titre -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="form-group">
                <label for="titre" class="form-label">Titre du cours *</label>
                <input type="text" id="titre" name="titre" class="form-control"
                       value="{{ old('titre') }}" placeholder="Titre du cours">
                @error('titre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Niveau -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="form-group">
                <label for="niveau" class="form-label">Niveau *</label>
                <select id="niveau" name="niveau" class="form-select">
                    <option value="">Sélectionner</option>
                    <option value="Maternelle" {{ old('niveau')=='Maternelle' ? 'selected' : '' }}>Maternelle</option>
                    <option value="Primaire" {{ old('niveau')=='Primaire' ? 'selected' : '' }}>Primaire</option>
                    <option value="Collège" {{ old('niveau')=='Collège' ? 'selected' : '' }}>Collège</option>
                    <option value="Lycée" {{ old('niveau')=='Lycée' ? 'selected' : '' }}>Lycée</option>
                </select>
                @error('niveau')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Professeur -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="form-group">
                <label for="prof_id" class="form-label">Professeur *</label>
                <select id="prof_id" name="prof_id" class="form-select">
                <option value="">Sélectionner</option>

                @isset($profs)
                    @if(!$profs->isEmpty())
                        @foreach($profs as $prof)
                            <option value="{{ $prof->id }}"
                                {{ old('prof_id') == $prof->id ? 'selected' : '' }}>
                                {{ $prof->nom }} {{ $prof->prenom }}
                            </option>
                        @endforeach
                    @else
                        <option value="">Aucun professeur disponible</option>
                    @endif
                @endisset

            </select>
                @error('prof_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Dates -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="form-group">
                <label for="date_debut" class="form-label">Date de début *</label>
                <input type="date" id="date_debut" name="date_debut" class="form-control"
                       value="{{ old('date_debut') }}">
                @error('date_debut')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="date_fin" class="form-label">Date de fin *</label>
                <input type="date" id="date_fin" name="date_fin" class="form-control"
                       value="{{ old('date_fin') }}">
                @error('date_fin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Salle -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="form-group">
                <label for="salle" class="form-label">Salle *</label>
                <input type="text" id="salle" name="salle" class="form-control"
                       value="{{ old('salle') }}" placeholder="Salle">
                @error('salle')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Submit -->
    <div class="row">
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-enroll">
                <i class="bi bi-check-circle me-2"></i>
                Enregistrer le cours
            </button>
        </div>
    </div>
</form>

            </div>
          </div><!-- End Form Column -->

    </section><!-- /Enroll Section -->

  </main>

@endsection
```
