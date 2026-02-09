@extends('pagePrincipale')
@section('contenu')

@section('PageTitle')
  <li class="current">Students</li>
@endsection

<main class="main">
  
  <section id="students" class="instructors section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      
      
      <div class="row gy-4">
        
          
        
        @isset($data)
        @if(!$data->isEmpty())
        @foreach($data as $etudiant)

        <div class="col-xl-3 col-lg-4 col-md-6"
             data-aos="fade-up"
             data-aos-delay="{{ $loop->index * 50 + 200 }}">

          <!-- نفس instructor-card -->
          <div class="instructor-card">

            <!-- image -->
            <div class="instructor-image">

              @if($etudiant->document_path)
                @if(Str::endsWith($etudiant->document_path, ['.jpg','.jpeg','.png','.webp']))
                  <img src="{{ asset('storage/'.$etudiant->document_path) }}" class="img-fluid" alt="">
                @else
                  <img src="{{ asset('assets/img/default-avatar.webp') }}" class="img-fluid" alt="">
                @endif
              @else
                <img src="{{ asset('assets/img/default-avatar.webp') }}" class="img-fluid" alt="">
              @endif

              <!-- overlay -->
              <div class="overlay-content">
                <div class="stats-grid">
                  <div class="stat">
                    <span class="number">{{ $etudiant->grades_count ?? 0 }}</span>
                    <span class="label">Grades</span>
                  </div>
                  <div class="stat">
                    <span class="number">{{ $etudiant->average ?? '-' }}</span>
                    <span class="label">Average</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- info -->
            <div class="instructor-info">
              <h5>{{ $etudiant->nom }} {{ $etudiant->prenom }}</h5>
              <p class="specialty">{{ $etudiant->niveau }}</p>
              <p class="description">
                Date de naissance : {{ $etudiant->date_naissance }}
              </p>

              <form method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mt-2">
                  <input type="file"
                         name="document"
                         class="form-control">
                </div>

                <div class="action-buttons mt-2">
                  <a href="{{route('etudians.edit')}}">modifier</a>
                  <a href="{{route('etudians.delete')}}">supperimer</a>
                </div>
              </form>
            </div>

          </div>
        </div>

        @endforeach
        @else
          <h3>Aucun étudiant trouvé</h3>
        @endif
        @endisset

      </div>
    </div>
  </section>

</main>
@endsection
