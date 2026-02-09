@extends('pagePrincipale')
@section('contenu')

<!-- Page Title -->
@section('PageTitle')
  <li class="current">Enroll</li>
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
                <h2>Enroll in Your Dream Course</h2>
                <p>Take the next step in your educational journey. Complete the form below to secure your spot in our comprehensive online learning program.</p>
              </div>

              <form class="enrollment-form" action="{{route('etudians.store')}}" method="POST" action="#" data-aos="fade-up" data-aos-delay="300" >
                  @csrf

                  <!-- Informations de l’élève -->
                  <h3>Informations de l’élève</h3>
                  <div class="row mb-4">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="nom" class="form-label">Nom *</label>
                              <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" value="{{old('nom')}}" >
                              @error('nom')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="prenom" class="form-label">Prénom *</label>
                              <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prénom" value="{{old('prenom')}}"  >
                              @error('prenom')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                          </div>
                      </div>
                  </div>

                  <div class="row mb-4">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="date_naissance" class="form-label">Date de naissance *</label>
                              <input type="date" id="date_naissance" name="date_naissance" class="form-control"  value="{{old('date_naissance')}}">
                              @error('date_naissance')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="sexe" class="form-label">Sexe *</label>
                              <select id="sexe" name="sexe" class="form-select"  value="{{old('sexe')}}" >
                                  <option value="">Sélectionner</option>
                                  <option value="Masculin">Masculin</option>
                                  <option value="Féminin">Féminin</option>
                              </select>
                              @error('sexe')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                          </div>
                      </div>
                  </div>

                  <div class="row mb-4">
                      <div class="col-12">
                          <div class="form-group">
                              <label for="niveau" class="form-label">Niveau scolaire *</label>
                              <select id="niveau" name="niveau" class="form-select" value="{{old('niveau')}}" >
                                  <option value="">Sélectionner</option>
                                  <option value="Maternelle">Maternelle</option>
                                  <option value="Primaire">Primaire</option>
                                  <option value="Collège">Collège</option>
                                  <option value="Lycée">Lycée</option>
                              </select>
                              @error('niveau')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                          </div>
                      </div>
                  </div>

                  <!-- Informations du parent -->
                  <h3>Informations du parent</h3>
                  <div class="row mb-4">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="parent_nom" class="form-label">Nom du parent *</label>
                              <input type="text" id="parent_nom" name="parent_nom" class="form-control" placeholder="Nom du parent" value="{{old('parent_nom')}}" >
                              @error('parent_nom')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="telephone" class="form-label">Téléphone *</label>
                              <input type="tel" id="telephone" name="telephone" class="form-control" placeholder="Téléphone" value="{{old('telephone')}}" >
                              @error('telephone')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                          </div>
                      </div>
                  </div>

                  <div class="row mb-4">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}" >
                              @error('email')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="adresse" class="form-label">Adresse</label>
                              <textarea id="adresse" name="adresse" class="form-control" placeholder="Adresse" value="{{old('adresse')}}"></textarea>
                              @error('adresse')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                          </div>
                      </div>
                  </div>

                  <!-- Informations d’inscription -->
                  <h3>Informations d’inscription</h3>
                  <div class="row mb-4">
                      <div class="col-12">
                          <div class="form-group">
                              <label for="annee_scolaire" class="form-label">Année scolaire</label>
                              <input type="text" id="annee_scolaire" name="annee_scolaire" class="form-control" value="2024/2025" readonly value="{{old('annee_scolaire')}}">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-12 text-center">
                          <button type="submit" class="btn btn-enroll">
                              <i class="bi bi-check-circle me-2"></i>
                              S’inscrire
                          </button>
                      </div>
                  </div>
              </form>


            </div>
          </div><!-- End Form Column -->

          <div class="col-lg-4 d-none d-lg-block">
            <div class="enrollment-benefits" data-aos="fade-left" data-aos-delay="400">
              <h3>Why Choose Our Courses?</h3>
              <div class="benefit-item">
                <div class="benefit-icon">
                  <i class="bi bi-trophy"></i>
                </div>
                <div class="benefit-content">
                  <h4>Expert Instructors</h4>
                  <p>Learn from industry professionals with years of real-world experience</p>
                </div>
              </div><!-- End Benefit Item -->

              <div class="benefit-item">
                <div class="benefit-icon">
                  <i class="bi bi-clock"></i>
                </div>
                <div class="benefit-content">
                  <h4>Flexible Learning</h4>
                  <p>Study at your own pace with 24/7 access to course materials</p>
                </div>
              </div><!-- End Benefit Item -->

              <div class="benefit-item">
                <div class="benefit-icon">
                  <i class="bi bi-award"></i>
                </div>
                <div class="benefit-content">
                  <h4>Certification</h4>
                  <p>Earn industry-recognized certificates upon course completion</p>
                </div>
              </div><!-- End Benefit Item -->

              <div class="benefit-item">
                <div class="benefit-icon">
                  <i class="bi bi-people"></i>
                </div>
                <div class="benefit-content">
                  <h4>Community Support</h4>
                  <p>Connect with fellow students and get help when you need it</p>
                </div>
              </div><!-- End Benefit Item -->

              <div class="enrollment-stats mt-4">
                <div class="stat-item">
                  <span class="stat-number">15,000+</span>
                  <span class="stat-label">Students Enrolled</span>
                </div>
                <div class="stat-item">
                  <span class="stat-number">98%</span>
                  <span class="stat-label">Completion Rate</span>
                </div>
                <div class="stat-item">
                  <span class="stat-number">4.9/5</span>
                  <span class="stat-label">Average Rating</span>
                </div>
              </div><!-- End Stats -->

            </div>
          </div><!-- End Benefits Column -->

        </div>

      </div>

    </section><!-- /Enroll Section -->

  </main>

  @endsection