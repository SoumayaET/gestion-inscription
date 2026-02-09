@extends('pagePrincipale')

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
                <span class="error-badge" data-aos="zoom-in" data-aos-delay="400">Error</span>
                <h1 class="error-code" data-aos="fade-up" data-aos-delay="500">404</h1>
                <h2 class="error-title" data-aos="fade-up" data-aos-delay="600">Page Not Found</h2>
                <p class="error-description" data-aos="fade-up" data-aos-delay="700">
                  The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
                </p>

                <div class="error-actions" data-aos="fade-up" data-aos-delay="800">
                  <a href="/" class="btn-home">
                    <i class="bi bi-house-door"></i> Back to Home
                  </a>
                  <a href="#" class="btn-help">
                    <i class="bi bi-question-circle"></i> Help Center
                  </a>
                </div>

                <div class="error-suggestions" data-aos="fade-up" data-aos-delay="900">
                  <h3>You might want to:</h3>
                  <ul>
                    <li><a href="#"><i class="bi bi-arrow-right-circle"></i> Check our sitemap</a></li>
                    <li><a href="#"><i class="bi bi-arrow-right-circle"></i> Contact support</a></li>
                    <li><a href="#"><i class="bi bi-arrow-right-circle"></i> Return to previous page</a></li>
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
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>A108 Adam Street</p>
          <p>New York, NY 535022</p>
          <p>United States</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
          <p><strong>Email:</strong> <span>info@example.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Learner</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  @endsection