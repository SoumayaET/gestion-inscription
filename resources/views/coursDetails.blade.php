@extends('layouts.app')

@section('PageTitle')
  <li class="current">Détails du Cours</li>
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
              <img src="{{ asset('assets/img/education/courses-5.webp') }}" class="img-fluid">
            </div>

            <div class="instructor-info">
              <h2>{{ $cours->titre }}</h2>
              <p class="title">Niveau : {{ $cours->niveau }}</p>

              <div class="credentials">
                <span class="credential">
                    Salle : {{ $cours->salle ?? 'Non définie' }}
                </span>

                <span class="credential">
                    Début : {{ $cours->date_debut ?? 'Non définie' }}
                </span>

                <span class="credential">
                    Fin : {{ $cours->date_fin ?? 'Non définie' }}
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
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#about">
                Informations
              </button>
            </li>
          </ul>

          <div class="tab-content custom-tab-content">

            <div class="tab-pane fade show active" id="about">

              <div class="about-content">

                <div class="bio-section">
                  <h4>Détails du cours</h4>

                  <p><strong>Titre :</strong> {{ $cours->titre }}</p>
                  <p><strong>Niveau :</strong> {{ $cours->niveau }}</p>
                  <p><strong>Salle :</strong> {{ $cours->salle ?? 'Non définie' }}</p>
                  <p><strong>Date début :</strong> {{ $cours->date_debut ?? 'Non définie' }}</p>
                  <p><strong>Date fin :</strong> {{ $cours->date_fin ?? 'Non définie' }}</p>

                  <p><strong>Créé le :</strong> {{ $cours->created_at }}</p>
                  <p><strong>Modifié le :</strong> {{ $cours->updated_at }}</p>

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
                  <h5>{{ $cours->niveau }}</h5>
                  <p>Niveau</p>
                </div>
              </div>

              <div class="stat-box">
                <div class="stat-content">
                  <h5>{{ $cours->salle ?? '-' }}</h5>
                  <p>Salle</p>
                </div>
              </div>

              <div class="stat-box">
                <div class="stat-content">
                  <h5>{{ $cours->date_debut ?? '-' }}</h5>
                  <p>Date début</p>
                </div>
              </div>

              <div class="stat-box">
                <div class="stat-content">
                  <h5>{{ $cours->date_fin ?? '-' }}</h5>
                  <p>Date fin</p>
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
