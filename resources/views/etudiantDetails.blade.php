@extends('layouts.app')

@section('PageTitle')
  <li class="current">Détails Étudiant</li>
@endsection

@section('contenu')

<main class="main">

<section class="instructor-profile section">
  <div class="container">

    <div class="row">

      <div class="col-lg-12">
        <div class="instructor-hero-banner">
          <div class="hero-background">
            <img src="{{ asset('assets/img/education/showcase-4.webp') }}" class="img-fluid">
            <div class="hero-overlay"></div>
          </div>

          <div class="hero-content">

            <div class="instructor-avatar">
              @if($etudiant->document_path)
               <img src="{{ asset('storage/' . $etudiant->document_path) }}" alt="Photo de l'étudiant">
            @else
                <img src="{{ asset('assets/img/default-avatar.webp') }}" 
                    alt="Avatar" class="img-fluid">
            @endif
            </div>

            <div class="instructor-info">
              <h2>{{ $etudiant->nom }} {{ $etudiant->prenom }}</h2>
              <p class="title">Niveau : {{ $etudiant->niveau }}</p>

              <div class="credentials">
                <span class="credential">
                  Année scolaire : {{ $etudiant->annee_scolaire }}
                </span>

                <span class="credential">
                  Sexe : {{ $etudiant->sexe }}
                </span>

                <span class="credential">
                  Date naissance : {{ $etudiant->date_naissance }}
                </span>
              </div>

            </div>

          </div>
        </div>
      </div>

    </div>

    <div class="row mt-5">

      <div class="col-lg-8">

        <div class="content-tabs">

          <ul class="nav nav-tabs custom-tabs">
            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#info">
                Informations
              </button>
            </li>
          </ul>

          <div class="tab-content custom-tab-content">

            <div class="tab-pane fade show active" id="info">

              <div class="about-content">

                <div class="bio-section">
                  <h4>Informations personnelles</h4>

                  <p><strong>Nom :</strong> {{ $etudiant->nom }}</p>
                  <p><strong>Prénom :</strong> {{ $etudiant->prenom }}</p>
                  <p><strong>Date de naissance :</strong> {{ $etudiant->date_naissance }}</p>
                  <p><strong>Sexe :</strong> {{ $etudiant->sexe }}</p>
                  <p><strong>Niveau :</strong> {{ $etudiant->niveau }}</p>
                  <p><strong>Année scolaire :</strong> {{ $etudiant->annee_scolaire }}</p>

                  <hr>

                  <h4>Contact</h4>

                  <p><strong>Parent :</strong> {{ $etudiant->parent_nom }}</p>
                  <p><strong>Téléphone :</strong> {{ $etudiant->telephone }}</p>
                  <p><strong>Email :</strong> {{ $etudiant->email ?? 'Non défini' }}</p>
                  <p><strong>Adresse :</strong> {{ $etudiant->adresse ?? 'Non définie' }}</p>

                  <hr>

                  <h4>Document</h4>

                  <p>
                    <strong>Fichier :</strong>
                    <a href="{{ asset('storage/'.$etudiant->document_path) }}" target="_blank">
                        {{ $etudiant->document_path }}
                    </a>
                  </p>

                  <hr>

                  <p><strong>Créé le :</strong> {{ $etudiant->created_at }}</p>
                  <p><strong>Modifié le :</strong> {{ $etudiant->updated_at }}</p>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

      <div class="col-lg-4">

        <div class="sidebar-widgets">

          <div class="stats-widget">
            <h4>Résumé</h4>

            <div class="stats-grid">

              <div class="stat-box">
                <div class="stat-content">
                  <h5>{{ $etudiant->niveau }}</h5>
                  <p>Niveau</p>
                </div>
              </div>

              <div class="stat-box">
                <div class="stat-content">
                  <h5>{{ $etudiant->annee_scolaire }}</h5>
                  <p>Année scolaire</p>
                </div>
              </div>

              <div class="stat-box">
                <div class="stat-content">
                  <h5>{{ $etudiant->sexe }}</h5>
                  <p>Sexe</p>
                </div>
              </div>

              <div class="stat-box">
                <div class="stat-content">
                  <h5>{{ $etudiant->telephone }}</h5>
                  <p>Téléphone</p>
                </div>
              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>
</section>

</main>

@endsection
