```blade
@extends('layouts.app')
@section('contenu')

@section('PageTitle')
  <li class="current">Cours</li>
@endsection

<main class="main">

<section id="courses-2" class="courses-2 section">
  
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    
    <div class="row">

      <div class="col-lg-9">
        
        <div class="courses-header" data-aos="fade-left" data-aos-delay="100">
          <div class="search-box">
            <a  class="btn btn-primary"  href="{{ route('cours.create') }}">
              Ajouter un cours
            </a>
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
          </div>
        </div>

        <div class="courses-grid" data-aos="fade-up" data-aos-delay="200">
          <div class="row">

            @forelse($cours as $cour)
            <div class="col-lg-6 col-md-6">
              <div class="course-card">

                <div class="course-image">
                  <img src="{{ asset('assets/img/education/courses-3.webp') }}" 
                       alt="Cours" class="img-fluid">

                  @if($cour->niveau == 'Advanced')
                    <div class="course-badge">Avancé</div>
                  @elseif($cour->niveau == 'Beginner')
                    <div class="course-badge badge-free">Débutant</div>
                  @endif
                </div>

                <div class="course-content">

                  <div class="course-meta">
                    <span class="category">Cours</span>
                    <span class="level">{{ $cour->niveau }}</span>
                  </div>

                  <h3>{{ $cour->titre }}</h3>

                  <p>
                    Salle : {{ $cour->salle ?? 'Non définie' }}
                  </p>

                  <div class="course-stats">

                    @if($cour->date_debut)
                    <div class="stat">
                      <i class="bi bi-calendar"></i>
                      <span>
                        {{ \Carbon\Carbon::parse($cour->date_debut)->format('d/m/Y') }}
                      </span>
                    </div>
                    @endif

                    @if($cour->date_fin)
                    <div class="stat">
                      <i class="bi bi-calendar-check"></i>
                      <span>
                        {{ \Carbon\Carbon::parse($cour->date_fin)->format('d/m/Y') }}
                      </span>
                    </div>
                    @endif

                  </div>

                  <div class="instructor-info">
                    <img src="{{ asset('assets/img/person/person-m-3.webp') }}" 
                         class="instructor-avatar">
                    <span class="instructor-name">
                      @if($cour->prof)
                      Professeur : {{ $cour->prof->nom }} {{ $cour->prof->prenom }}
                      @else Professeur non assigné
                      @endif
                    </span>
                  </div>

                  <div class="action-buttons mt-2">
                  <a class="btn btn-success" href="{{route('cours.edit',$cour->id)}}">Modifier</a>
                  <a class=" btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?');" href="{{route('cours.destroy',$cour->id)}}">Supprimer</a>
                  <a class="btn btn-primary rounded-pill "href="{{route('cours.details',$cour->id)}}">Détails</a>
                </div>

                </div>

              </div>
            </div>
            @empty
              <div class="col-12">
                <div class="alert alert-warning text-center">
                  Aucun cours disponible.
                </div>
              </div>
            @endforelse

          </div>
        </div>

        {{-- Pagination Laravel --}}
        <div class="pagination-wrapper" data-aos="fade-up" data-aos-delay="300">
          <div class="d-flex justify-content-center">
            
          </div>
        </div>

      </div>
    </div>
  </div>

</section>

</main>

@endsection
```
