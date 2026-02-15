@extends('layouts.app')

@section('PageTitle')
  <li class="current">Détails Professeur</li>
@endsection

@section('contenu')

<main class="main">

<section class="instructor-profile section">
  <div class="container">

    <div class="row">

      <div class="col-lg-12">
        <div class="instructor-hero-banner">

          {{-- حذف الصورة الخلفية --}}
          <div class="hero-content justify-content-center">

            {{-- حذف الصورة الشخصية --}}
            <div class="instructor-info text-center">
              <h2>{{ $prof->nom }} {{ $prof->prenom }}</h2>
              <p class="title">Professeur</p>
            </div>

          </div>
        </div>
      </div>

    </div>

    <div class="row mt-5">

      <div class="col-lg-8">

        <div class="content-tabs">

          <div class="about-content">

            <div class="bio-section">
              <h4>Informations personnelles</h4>

              <p><strong>Nom :</strong> {{ $prof->nom }}</p>
              <p><strong>Prénom :</strong> {{ $prof->prenom }}</p>
              <p><strong>Adresse :</strong> {{ $prof->adresse ?? 'Non définie' }}</p>

              <p><strong>Créé le :</strong> {{ $prof->created_at }}</p>
              <p><strong>Modifié le :</strong> {{ $prof->updated_at }}</p>

            </div>

          </div>

        </div>

      </div>

      {{-- Sidebar --}}
      <div class="col-lg-4">

        <div class="sidebar-widgets">

          <div class="stats-widget">
            <h4>Contact & Cours</h4>

            <div class="stats-grid">

              {{-- Téléphone --}}
              <div class="stat-box">
                <div class="stat-content">
                  <h6>Téléphone</h6>
                  <p style="word-break: break-word;">
                    {{ $prof->telephone }}
                  </p>
                </div>
              </div>

              {{-- Email --}}
              <div class="stat-box">
                <div class="stat-content">
                  <h6>Email</h6>
                  <p style="word-break: break-word;">
                    {{ $prof->email }}
                  </p>
                </div>
              </div>

              {{-- Cours --}}
              <div class="stat-box">
                  <div class="stat-content">
                      <h6>Cours</h6>

                      @if($prof->cours->count())
                          @foreach($prof->cours as $cour)
                              <p>{{ $cour->titre }}</p>
                          @endforeach
                      @else
                          <p>Non assigné</p>
                      @endif

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
