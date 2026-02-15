@extends('layouts.app')
@section('contenu')

@section('PageTitle')
  <li class="current">Ajouter un professeur</li>
@endsection

<main class="main">
  <section id="enroll" class="enroll section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      @if(Session::has('success'))
        <div class="alert alert-success">
          {{ Session::get('success') }}
        </div>
      @endif
      @if(Session::has('error'))
        <div class="alert alert-danger">
          {{ Session::get('error') }}
        </div>
      @endif

      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="enrollment-form-wrapper">

            <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
              <h2>Ajouter un nouveau professeur</h2>
              <p>Remplissez le formulaire ci-dessous pour créer et enregistrer un nouveau professeur.</p>
            </div>

            <form class="enrollment-form" action="{{ route('profs.store') }}" method="POST" data-aos="fade-up" data-aos-delay="300">
              @csrf

              <h3>Informations du professeur</h3>

              <!-- Nom -->
              <div class="row mb-4">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="nom" class="form-label">Nom *</label>
                    <input type="text" id="nom" name="nom" class="form-control"
                           value="{{ old('nom') }}" placeholder="Nom du professeur">
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
                           value="{{ old('prenom') }}" placeholder="Prénom du professeur">
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
                           value="{{ old('telephone') }}" placeholder="Téléphone">
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
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input type="email" id="email" name="email" class="form-control"
                           value="{{ old('email') }}" placeholder="Adresse e-mail">
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
                              placeholder="Adresse">{{ old('adresse') }}</textarea>
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
                      @isset($cours)
                        @foreach($cours as $cour)
                          <option value="{{ $cour->id }}" {{ old('cours_id') == $cour->id ? 'selected' : '' }}>
                            {{ $cour->titre }}
                          </option>
                        @endforeach
                      @endisset
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
                    Enregistrer le professeur
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
