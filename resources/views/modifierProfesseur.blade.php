@extends('layouts.app')

@section('PageTitle')
  <li class="current">Modifier Professeur</li>
@endsection

@section('contenu')
<main class="main">
  <section id="edit-prof" class="enroll section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

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

            <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
              <h2>Modifier les informations du professeur</h2>
              <p>Modifiez les champs ci-dessous pour mettre à jour le professeur sélectionné.</p>
            </div>

            <form class="enrollment-form" 
                  
                  method="POST" 
                  action="{{ route('profs.update',$prof["id"] )}}"
                  data-aos="fade-up" data-aos-delay="300">
              @csrf
              

              <h3>Informations du professeur</h3>

              <!-- Nom -->
              <div class="row mb-4">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="nom" class="form-label">Nom *</label>
                    <input type="text" id="nom" name="nom" class="form-control"
                           value="{{ old('nom', $prof->nom) }}" placeholder="Nom du professeur">
                    @error('nom')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

              <!-- Prénom -->
              <div class="row mb-4">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="prenom" class="form-label">Prénom *</label>
                    <input type="text" id="prenom" name="prenom" class="form-control"
                           value="{{ old('prenom', $prof->prenom) }}" placeholder="Prénom du professeur">
                    @error('prenom')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

              <!-- Téléphone -->
              <div class="row mb-4">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="telephone" class="form-label">Téléphone</label>
                    <input type="text" id="telephone" name="telephone" class="form-control"
                           value="{{ old('telephone', $prof->telephone) }}" placeholder="Téléphone">
                    @error('telephone')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

              <!-- Email -->
              <div class="row mb-4">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control"
                           value="{{ old('email', $prof->email) }}" placeholder="Email">
                    @error('email')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

              <!-- Adresse -->
              <div class="row mb-4">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="adresse" class="form-label">Adresse</label>
                    <textarea id="adresse" name="adresse" class="form-control" rows="3"
                              placeholder="Adresse">{{ old('adresse', $prof->adresse) }}</textarea>
                    @error('adresse')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

              <!-- Cours associé -->
              <div class="row mb-4">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="cours_id" class="form-label">Cours associé</label>
                    <select id="cours_id" name="cours_id" class="form-select">
  <option value="">Sélectionner</option>
  @foreach($cours as $cour)
    <option value="{{ $cour->id }}" 
      {{ old('cours_id', $prof->cours_id) == $cour->id ? 'selected' : '' }}>
      {{ $cour->titre }}
    </option>
  @endforeach
</select>
                    @error('cours_id')
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
                    Mettre à jour le professeur
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