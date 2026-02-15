@extends('layouts.app')

<!-- Page Title -->
@section('PageTitle')
  <li class="current">404</li>
@endsection
<!-- End Page Title -->


@section('contenu')

  <main class="main">

    <!-- Error 404 Section -->
    <section id="error-404" class="error-404 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="error-wrapper">
          <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
              <div class="error-illustration">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <div class="circle circle-1"></div>
                <div class="circle circle-2"></div>
                <div class="circle circle-3"></div>
              </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
              <div class="error-content">
                <span class="error-badge" data-aos="zoom-in" data-aos-delay="400">Erreur</span>
                <h1 class="error-code" data-aos="fade-up" data-aos-delay="500">404</h1>
                <h2 class="error-title" data-aos="fade-up" data-aos-delay="600">Page non trouvée</h2>
                <p class="error-description" data-aos="fade-up" data-aos-delay="700">
                  La page que vous recherchez a peut-être été supprimée, son nom a été modifié ou elle est temporairement indisponible.
                </p>

                <div class="error-actions" data-aos="fade-up" data-aos-delay="800">
                  <a href="/" class="btn-home">
                    <i class="bi bi-house-door"></i> Retour à l'accueil
                  </a>
                  <a href="#" class="btn-help">
                    <i class="bi bi-question-circle"></i> Centre d'aide
                  </a>
                </div>

                <div class="error-suggestions" data-aos="fade-up" data-aos-delay="900">
                  <h3>Vous pourriez :</h3>
                  <ul>
                    <li><a href="#"><i class="bi bi-arrow-right-circle"></i> Consulter notre plan du site</a></li>
                    <li><a href="#"><i class="bi bi-arrow-right-circle"></i> Contacter le support</a></li>
                    <li><a href="#"><i class="bi bi-arrow-right-circle"></i> Retourner à la page précédente</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Error 404 Section -->

  </main>

  <footer id="footer" class="footer accent-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Learner</span>
          </a>
          <p>Ce texte est un exemple descriptif. Vous pouvez le remplacer par une description réelle de votre plateforme ou de votre établissement.</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Liens utiles</h4>
          <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">À propos</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Conditions d'utilisation</a></li>
            <li><a href="#">Politique de confidentialité</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Nos services</h4>
          <ul>
            <li><a href="#">Conception Web</a></li>
            <li><a href="#">Développement Web</a></li>
            <li><a href="#">Gestion de produits</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Design graphique</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contactez-nous</h4>
          <p>A108 Adam Street</p>
          <p>New York, NY 535022</p>
          <p>États-Unis</p>
          <p class="mt-4"><strong>Téléphone :</strong> <span>+1 5589 55488 55</span></p>
          <p><strong>Email :</strong> <span>info@example.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Droits d'auteur</span> <strong class="px-1 sitename">Learner</strong> <span>Tous droits réservés</span></p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  @endsection
