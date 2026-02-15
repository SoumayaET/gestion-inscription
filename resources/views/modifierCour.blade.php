@extends('layouts.app')

@section('PageTitle')
  <li class="current">Modifier les informations</li>
@endsection

@section('contenu')
<main class="main">

  <section id="edit-coure" class="enroll section">
    <div class="container">

      @if(Session::has('success'))
          <div class="alert alert-success">
              {{ session::get('success') }}
          </div>
      @endif
      @if(Session::has('error'))
          <div class="alert alert-danger" role="alert">
              {{ session::get('error') }}
          </div>
      @endif

      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="enrollment-form-wrapper">

            <div class="enrollment-header text-center mb-5">
              <h2>Modifier les informations du cours</h2>
              <p>Modifiez les champs ci-dessous pour mettre à jour le cours sélectionné.</p>
            </div>

            <form class="enrollment-form" 
                  action="{{ route('cours.update', $cour->id) }}" 
                  method="POST">
              @csrf
              

              <h3>Informations du cours</h3>

              <!-- Titre -->
              <div class="mb-4">
                <label for="titre" class="form-label">Titre du cours *</label>
                <input type="text" id="titre" name="titre" class="form-control"
                       value="{{ old('titre', $cour->titre) }}">
                @error('titre')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <!-- Niveau -->
              <div class="mb-4">
                <label for="niveau" class="form-label">Niveau *</label>
                <select id="niveau" name="niveau" class="form-select">
                  <option value="">Sélectionner</option>
                  <option value="Maternelle" {{ old('niveau', $cour->niveau)=='Maternelle' ? 'selected' : '' }}>Maternelle</option>
                  <option value="Primaire" {{ old('niveau', $cour->niveau)=='Primaire' ? 'selected' : '' }}>Primaire</option>
                  <option value="Collège" {{ old('niveau', $cour->niveau)=='Collège' ? 'selected' : '' }}>Collège</option>
                  <option value="Lycée" {{ old('niveau', $cour->niveau)=='Lycée' ? 'selected' : '' }}>Lycée</option>
                </select>
                @error('niveau')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <!-- Prof -->
              <div class="mb-4">
                <label for="prof_id" class="form-label">Professeur *</label>
                <select id="prof_id" name="prof_id" class="form-select">
                  <option value="">Sélectionner</option>
                  @foreach($profs as $prof)
                    <option value="{{ $prof->id }}" 
                      {{ old('prof_id', $cour->prof_id) == $prof->id ? 'selected' : '' }}>
                      {{ $prof->nom }} {{ $prof->prenom }}
                    </option>
                  @endforeach
                </select>
                @error('prof_id')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <!-- Dates -->
              <div class="row mb-4">
                <div class="col-md-6">
                  <label for="date_debut" class="form-label">Date début *</label>
                  <input type="date" id="date_debut" name="date_debut" class="form-control"
                         value="{{ old('date_debut', $cour->date_debut) }}">
                  @error('date_debut')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label for="date_fin" class="form-label">Date fin *</label>
                  <input type="date" id="date_fin" name="date_fin" class="form-control"
                         value="{{ old('date_fin', $cour->date_fin) }}">
                  @error('date_fin')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <!-- Salle -->
              <div class="mb-4">
                <label for="salle" class="form-label">Salle *</label>
                <input type="text" id="salle" name="salle" class="form-control"
                       value="{{ old('salle', $cour->salle) }}">
                @error('salle')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <!-- Submit -->
              <div class="text-center">
                <button type="submit" class="btn btn-enroll">
                  Mettre à jour le cours
                </button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
