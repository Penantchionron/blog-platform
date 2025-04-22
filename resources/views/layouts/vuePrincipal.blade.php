<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="theme-color" content="#ffffff">
        <title>9Un Global Services LLC</title>
        <!-- Fonts -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
       
        <!-- Font Awesome (Google Icon) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" />
       <link rel="stylesheet" href="https://unpkg.com/swiper@8.4.5/swiper-bundle.min.css" />
       <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
       <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}" />
       <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    </head>
    <body>
     @include('layouts.secondary.header')
     @yield('content')
     @include('layouts.secondary.footer')
        <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border border-success">
            <div class="modal-header">
              <h5 class="modal-title text-success" id="registerModalLabel">Créer un compte</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('register') }}">
                  @csrf
              
                  <div class="row">
                      <div class="mb-3 col-md-6">
                          <label>Prénom</label>
                          <input type="text" name="first_name" class="form-control" required>
                      </div>
              
                      <div class="mb-3 col-md-6">
                          <label>Nom</label>
                          <input type="text" name="last_name" class="form-control">
                      </div>
              
                      <div class="mb-3 col-md-6">
                          <label>Pays</label>
                          <input type="text" name="country" class="form-control" required>
                      </div>
              
                      <div class="mb-3 col-md-6">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" required>
                      </div>
              
                      <div class="mb-3 col-md-6">
                          <label>Mot de passe</label>
                          <input type="password" name="password" class="form-control" required>
                      </div>
              
                      <div class="mb-3 col-md-6">
                          <label>Confirmation mot de passe</label>
                          <input type="password" name="password_confirmation" class="form-control" required>
                      </div>
                  </div>
              
                  <p class="text-muted text-center mt-4">Ou connecte-toi avec</p>
              
                  <div class="row mt-3">
                      <div class="col-md-6 pe-md-1 mb-2 mb-md-0">
                          <a href="{{ route('auth.google') }}" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center">
                              <i class="fab fa-google me-2"></i> Google
                          </a>
                      </div>
              
                      <div class="col-md-6 ps-md-1">
                          <button type="submit" class="btn btn-primary w-100">
                              Créer Un Compte
                          </button>
                      </div>
                  </div>
              </form>
              
            </div>
          </div>
        </div>
      </div>
      <!-- Login Modal -->
      <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border border-primary">
            <div class="modal-header">
              <h5 class="modal-title text-primary" id="loginModalLabel">Connexion</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('login') }}">
                  @csrf

                  <div class="mb-3">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" required>
                  </div>

                  <div class="mb-3">
                      <label>Mot de passe</label>
                      <input type="password" name="password" class="form-control" required>
                  </div>

                  <div class="d-flex justify-content-between mb-3">
                    <label><input type="checkbox" name="remember"> Se souvenir de moi</label>
                      <a href="{{ route('password.request') }}" class="text-primary">Mot de passe oublié ?</a>
                  </div>
                  
                  <div class="d-flex justify-content-between mb-3">
                    <p class="text-muted text-center mt-4">Ou connecte-toi avec</p>
                    <a href="{{ route('home') }}" class="text-primary" data-bs-toggle="modal" data-bs-target="#registerModal" style="font-size: 1.5em;">Je m'inscris </a>
                </div>
                  <div class="row mt-4">
                      <div class="col-md-6 text-end pe-1">
                          <a href="{{ route('auth.google') }}" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center">
                              <i class="fab fa-google me-2"></i> Google
                          </a>
                      </div>
                  
                      <div class="col-md-6 ps-1">
                          <button type="submit" class="btn btn-primary w-100">
                              Connexion
                          </button>
                      </div>
                  </div>
                                    
                  </div>
              </form>
            </div>
          </div>
        </div>
    </div> 
        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>

<!-- ✅ Bootstrap JS pour l'interactivité (dropdown, modals, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://unpkg.com/swiper@8.4.5/swiper-bundle.min.js?v=3"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js?v=3"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js?v=3"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js?v=3"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const burger = document.querySelector('.burger');
                const navLinks = document.querySelector('.nav-links');
        
                burger.addEventListener('click', function () {
                    navLinks.classList.toggle('active');
                });
            });
        </script>
      <script>
        $(document).ready(function() {
            // NiceScroll par exemple
            $("body").niceScroll();
        });
    </script> @if ($errors->any())
        <script>
            window.addEventListener("DOMContentLoaded", () => {
                const hasFirstName = "{{ old('first_name') }}" !== "";
                const target = hasFirstName ? "#registerModal" : "#loginModal";
                const modal = new bootstrap.Modal(document.querySelector(target));
                modal.show();
            });
        </script>
        @endif
    </body>
</html>
