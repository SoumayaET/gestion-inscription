@extends('layouts.app')
@section('contenu')
<main class="main">

    <!-- Section Héros des Cours -->
    <section id="courses-hero" class="courses-hero section light-background">

      <div class="hero-content">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
              <div class="hero-text">
                <h1>Plateforme d’inscription académique</h1>
                <p>
                    Cette application web est conçue pour faciliter le processus d’inscription
                    des étudiants au sein d’un établissement éducatif.
                </p>
                <div class="hero-stats">
                  <div class="stat-item">
                    <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="50000" data-purecounter-duration="2"></span>
                    <span class="label">Étudiants Inscrits</span>
                  </div>
                  <div class="stat-item">
                    <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="1200" data-purecounter-duration="2"></span>
                    <span class="label">Cours Experts</span>
                  </div>
                  <div class="stat-item">
                    <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="98" data-purecounter-duration="2"></span>
                    <span class="label">Taux de Réussite %</span>
                  </div>
                </div>

                <div class="hero-buttons">
                  <a href="#courses" class="btn btn-primary">Parcourir les Cours</a>
                  <a href="#about" class="btn btn-outline">En Savoir Plus</a>
                </div>

                <div class="hero-features">
                  <div class="feature">
                    <i class="bi bi-shield-check"></i>
                    <span>Programmes Certifiés</span>
                  </div>
                  <div class="feature">
                    <i class="bi bi-clock"></i>
                    <span>Accès à Vie</span>
                  </div>
                  <div class="feature">
                    <i class="bi bi-people"></i>
                    <span>Instructeurs Experts</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
              <div class="hero-image">
                <div class="main-image">
                  <img src="assets/img/education/courses-13.webp" alt="Apprentissage en Ligne" class="img-fluid">
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="hero-background">
        <div class="bg-shapes">
          <div class="shape shape-1"></div>
          <div class="shape shape-2"></div>
          <div class="shape shape-3"></div>
        </div>
      </div>

    </section><!-- /Section Héros des Cours -->

</main>
@endsection