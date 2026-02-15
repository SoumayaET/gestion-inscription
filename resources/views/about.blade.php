```php
@extends('layouts.app')
<!-- Page Title -->
@section('PageTitle')
  <li class="current">À propos</li>
@endsection
<!-- End Page Title -->
@section('contenu')
  <main class="main">

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/education/education-square-2.webp" alt="À propos de nous" class="img-fluid rounded-4">
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="about-content">
              <span class="subtitle">À propos de nous</span>
              <h2>Former les leaders de demain grâce à une éducation de qualité</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <div class="stats-row">
                <div class="stats-item">
                  <span class="count">15</span>
                  <p>Années d'expérience</p>
                </div>
                <div class="stats-item">
                  <span class="count">200+</span>
                  <p>Formateurs experts</p>
                </div>
                <div class="stats-item">
                  <span class="count">50k+</span>
                  <p>Étudiants dans le monde</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-5 pt-4">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="mission-card">
              <div class="icon-box">
                <i class="bi bi-bullseye"></i>
              </div>
              <h3>Notre mission</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Excepteur sint occaecat cupidatat non proident.</p>
            </div>
          </div>
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="mission-card">
              <div class="icon-box">
                <i class="bi bi-eye"></i>
              </div>
              <h3>Notre vision</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Excepteur sint occaecat cupidatat non proident.</p>
            </div>
          </div>
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="mission-card">
              <div class="icon-box">
                <i class="bi bi-award"></i>
              </div>
              <h3>Nos valeurs</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Excepteur sint occaecat cupidatat non proident.</p>
            </div>
          </div>
        </div>

        <div class="row mt-5 pt-3 align-items-center">
          <div class="col-lg-6 order-lg-2" data-aos="fade-up" data-aos-delay="300">
            <div class="achievements">
              <span class="subtitle">Pourquoi nous choisir</span>
              <h2>Transformer l'éducation pour un avenir meilleur</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
              <ul class="achievements-list">
                <li><i class="bi bi-check-circle-fill"></i> Options d’apprentissage flexibles et adaptées</li>
                <li><i class="bi bi-check-circle-fill"></i> Formateurs expérimentés dans l’industrie</li>
                <li><i class="bi bi-check-circle-fill"></i> Contenu pédagogique interactif et engageant</li>
                <li><i class="bi bi-check-circle-fill"></i> Orientation professionnelle et accompagnement à l’insertion</li>
                <li><i class="bi bi-check-circle-fill"></i> Plateforme d’apprentissage en ligne moderne</li>
              </ul>
              <a href="#" class="btn-explore">Découvrir plus <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6 order-lg-1" data-aos="fade-up" data-aos-delay="200">
            <div class="about-gallery">
              <div class="row g-3">
                <div class="col-6">
                  <img src="assets/img/education/education-1.webp" alt="Vie sur le campus" class="img-fluid rounded-3">
                </div>
                <div class="col-6">
                  <img src="assets/img/education/students-3.webp" alt="Réussite des étudiants" class="img-fluid rounded-3">
                </div>
                <div class="col-12 mt-3">
                  <img src="assets/img/education/campus-8.webp" alt="Notre campus" class="img-fluid rounded-3">
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

  </main>

@endsection
```
