@extends('layouts.app')
@section('contenu')

@section('PageTitle')
  <li class="current">Instructors</li>
@endsection



<main class="main">

<section id="instructors" class="instructors section">
  
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

            <a  class="btn btn-primary" href="{{ route('profs.create') }}">ajouter un prof</a>
    <div class="row gy-4">

      @forelse($profs as $prof)

      <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
        <div class="instructor-card">

          <div class="instructor-image">
            <img src="{{ asset('assets/img/education/teacher-2.webp') }}" class="img-fluid" alt="">
            
            <div class="overlay-content">
              <div class="rating-stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
                <span>5.0</span>
              </div>

              <div class="course-count">
                <i class="bi bi-play-circle"></i>
                <span>
                  {{ $prof->cours()->count() }} Courses
                </span>
              </div>
            </div>
          </div>

          <div class="instructor-info">
            <h5>{{ $prof->nom }} {{ $prof->prenom }}</h5>

            <p class="specialty">
              {{ $prof->email }}
            </p>

            <p class="description">
              {{ $prof->adresse ?? 'Adresse non définie' }}
            </p>

            <div class="stats-grid">
              <div class="stat">
                <span class="number">
                  {{ $prof->telephone }}
                </span>
                <span class="label">Téléphone</span>
              </div>

              <div class="stat">
                <span class="number">
                  {{ $prof->cours()->count() }}
                </span>
                <span class="label">Cours</span>
              </div>
            </div>

            <div class="action-buttons">
              
            </div>
            <div class="action-buttons mt-2">
                  <a class=" btn btn-success" href="{{route('profs.edit',$prof->id)}}">modifier</a>
                  <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce professeur ?');" class=" btn btn-danger" href="{{route('profs.destroy',$prof->id)}}">supperimer</a>
                  <a class="btn btn-primary rounded-pill "href="{{route('profs.details',$prof->id)}}">DT</a>

                </div>
          </div>

        </div>
      </div>

      @empty
        <div class="col-12">
          <div class="alert alert-warning text-center">
            Aucun professeur disponible.
          </div>
        </div>
      @endforelse

    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-4">
      
    </div>

  </div>

</section>

</main>

@endsection
