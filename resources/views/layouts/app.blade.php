<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Modèle Bootstrap Apprenant</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fichiers CSS Fournisseurs -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Fichier CSS Principal -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>
<body class="index-page">

  <!-- En-tête -->
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="{{ route('homePage') }}" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Apprenant</h1>
      </a>

      <!-- NAVIGATION AVEC RÔLES -->
      <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="{{ route('homePage') }}" class="active">Accueil</a></li>
            <li><a href="{{ route('about') }}">À propos</a></li>
            
            @if(Auth::check() && Auth::user()->role === 'admin')
                <!-- L’administrateur voit tout -->
                <li><a href="{{ route('profs.index') }}">Professeurs</a></li>
                <li><a href="{{ route('etudiants.index') }}">Étudiants</a></li>
                <li><a href="{{ route('cours.index') }}">Cours</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>

            @elseif(Auth::check() && Auth::user()->role === 'professeur')
                <!-- Le professeur voit ses cours + son compte + les étudiants -->
                <li><a href="{{ route('cours.index') }}">Mes Cours</a></li>
                <li><a href="{{ route('profs.details', Auth::user()->id) }}">Mon Compte</a></li>
                

            @elseif(Auth::check() && Auth::user()->role === 'etudiant')
                <!-- L’étudiant voit son compte + ses cours -->
                <li><a href="{{ route('cours.index') }}">Mes Cours</a></li>
                <a href="{{ route('etudiants.details', Auth::user()->id) }}">Mon Compte</a>
               

            @else
                <!-- Le visiteur voit les pages publiques -->
                <li><a href="{{ route('contact') }}">Contact</a></li>
                
                
            @endif
        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      @guest
          <a href="{{ route('enroll') }}" class="btn-getstarted">S'inscrire</a>
          <a href="{{ route('login') }}" class="btn-getstarted">Connexion</a>
      @else
          <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="btn-getstarted" style="border:none;">
                  Déconnexion
              </button>
          </form>
      @endguest
    </div>
  </header>

  <!-- Titre de la Page -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">À propos</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('homePage') }}">Accueil</a></li>
          @yield('PageTitle')
        </ol>
      </nav>
    </div>
  </div>

  <!-- Contenu -->
  @yield('contenu')

  <!-- Pied de page -->
  <footer id="footer" class="footer accent-background">
    <!-- Contenu du pied de page -->
  </footer>

  <!-- Bouton Retour en Haut -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Préchargeur -->
  <div id="preloader"></div>

  <!-- Fichiers JS Fournisseurs -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Fichier JS Principal -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>