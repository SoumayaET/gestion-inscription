<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Learner Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>
<body class="index-page">

  <!-- Header -->
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="{{ route('homePage') }}" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Learner</h1>
      </a>

      <!-- NAVIGATION WITH ROLES -->
      <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="{{ route('homePage') }}" class="active">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            

            @if(Auth::check() && Auth::user()->role === 'admin')
                <!-- المدير يرى كل شيء -->
                
                <li><a href="{{ route('profs.index') }}">Professeurs</a></li>
                <li><a href="{{ route('etudiants.index') }}">Etudiants</a></li>
                <li><a href="{{ route('cours.index') }}">Cours</a></li>
                
                <!-- //href="users.index'-->
                
                <li><a href="{{ route('contact') }}">Contact</a></li>

            @elseif(Auth::check() && Auth::user()->role === 'professeur')
                <!-- الأستاذ يرى الدروس + حسابه + التلاميذ -->
                <li><a href="{{ route('cours.index') }}">Mes Cours</a></li>
                <li><a href="{{ route('profs.details', Auth::user()->id) }}">Mon Compte</a></li>
                <li><a href="{{ route('etudiants.index') }}">Etudiants</a></li>

            @elseif(Auth::check() && Auth::user()->role === 'etudiant')
                <!-- الطالب يرى حسابه + الدروس -->
                <li><a href="{{ route('cours.index') }}">Mes Cours</a></li>
                <li><a href="{{ route('etudiants.details', Auth::user()->id) }}">Mon Compte</a></li>

            @else
                <!-- الزائر يرى الصفحات العامة -->
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="{{ route('cours.index') }}">Cours</a></li>
                

            @endif
            </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      @guest
                <a href="{{ route('register') }}" class="btn-getstarted">S'inscrire</a>
                <a href="{{ route('login') }}" class="btn-getstarted">Connexion</a>
            @else
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-getstarted" style="border:none;">
                        Logout
                    </button>
                </form>
            @endguest
          
      

    </div>
  </header>

  <!-- Page Title -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">About</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('homePage') }}">Home</a></li>
          @yield('PageTitle')
        </ol>
      </nav>
    </div>
  </div>

  <!-- Content -->
  @yield('contenu')

  <!-- Footer -->
  <footer id="footer" class="footer accent-background">
    <!-- محتوى الفوتر -->
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>

    {{-- <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
      <h1 class="sitename">Learner</h1>
    </a>

    <!-- NAVIGATION -->
    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('cours.index') }}">Cours</a></li>
        <li><a href="{{ route('profs.index') }}">Instructors</a></li>
        <li><a href="{{ route('etudiants.index') }}">Etudiants</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>

        <!-- AUTH LINKS INSIDE NAV -->
        @guest
            @if (Route::has('login'))
                <li><a href="{{ route('login') }}">Login</a></li>
            @endif

            @if (Route::has('register'))
                <li><a href="{{ route('register') }}">Register</a></li>
            @endif
        @else
            <li class="dropdown">
              <a href="#"><span>{{ Auth::user()->name }}</span></a>
              <ul>
                <li>
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                     Logout
                  </a>
                </li>
              </ul>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
        @endguest

      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>
</header>

<!-- Page Title -->
<div class="page-title light-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">About</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{ route('home') }}">Home</a></li>
        @yield('PageTitle')
      </ol>
    </nav>
  </div>
</div>

<!-- CONTENT -->
@yield('contenu')

<!-- Footer -->
<footer id="footer" class="footer accent-background">
</footer>

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>

<div id="preloader"></div>

<!-- JS -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html> --}}
