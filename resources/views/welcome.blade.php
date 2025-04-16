<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="theme-color" content="#ffffff">
        <title>9Un Global Services LLC</title>
        <!-- Fonts -->
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
       @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
     <header class="main-header">
            <div class="top-bar">
                <div class="container">
                    <div class="top-bar-links">
                        <ul class="d-flex align-items-center justify-content-end">
                            @guest
                                                            <!-- Bouton Login -->
                            <li>
                              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#loginModal">
                                  Login
                              </button>
                            </li>

                            <!-- Bouton Register -->
                            <li>
                              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#registerModal">
                                  Register Now
                              </button>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        
            <nav class="main-navbar" style="background:white;">
                <div class="container">
                    <div class="nav-inner d-flex align-items-center justify-content-between">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/logo.png') }}" alt="Logo" />
                            </a>
                        </div>
                        <div class="burger" onclick="document.querySelector('.nav-links').classList.toggle('active')">☰</div>
                        <div class="nav-links">
                            <ul class="d-flex flex-lg-row flex-column">
                                <li><a href="{{ route('home') }}">Home</a></li>
        
                                <li class="has-dropdown">
                                    <a href="#">Trading</a>
                                    <div class="dropdown-wrapper left-dropdown">
                                        <div class="menu-box">
                                            <ul>
                                                <li><a href="{{ route('pdf.index') }}"><span class="text">Formations - PDF</span></a></li>
                                                <li><a href="{{ route('articles.index') }}"><span class="text">Articles</span></a></li>
                                                <li><a href="{{ route('videos.index') }}"><span class="text">Videos</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
        
                                <li class="has-dropdown">
                                    <a href="#">Programmation & Développement</a>
                                    <div class="dropdown-wrapper left-dropdown">
                                        <div class="menu-box">
                                            <ul>
                                                <li><a href="#"><span class="text">Programmation</span></a></li>
                                                <li><a href="#"><span class="text">Fullstack Web</span></a></li>
                                                <li><a href="#"><span class="text">Fullstack Mobile</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
        
                                <li><a href="{{ route('articles.index') }}">Articles</a></li>
        
                                <li class="has-dropdown d-none">
                                    <a href="#">Hacking & CyberSécurité</a>
                                    <div class="dropdown-wrapper left-dropdown">
                                        <div class="menu-box">
                                            <ul>
                                                <li><a href="#"><span class="text">PDFs</span></a></li>
                                                <li><a href="#"><span class="text">Videos</span></a></li>
                                                <li><a href="{{ route('audios.index') }}"><span class="text">Audios</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
        
                                <li class="has-dropdown">
                                    <a href="#">Développement Personnel</a>
                                    <div class="dropdown-wrapper left-dropdown">
                                        <div class="menu-box">
                                            <ul>
                                                <li><a href="{{ route('videos.index') }}"><span class="text">Videos</span></a></li>
                                                <li><a href="{{ route('audios.index') }}"><span class="text">Audios</span></a></li>
                                                <li><a href="#"><span class="text">Éducation Financière</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
        
                                <li class="has-dropdown">
                                    <a href="#">Notre Entreprise</a>
                                    <div class="dropdown-wrapper left-dropdown">
                                        <div class="menu-box">
                                            <ul>
                                                <li><a href="#"><span class="text">À propos</span></a></li>
                                                <li><a href="#"><span class="text">Contact</span></a></li>
                                                <li><a href="{{ route('faq.accueil') }}"><span class="text">FAQs</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        
        <main>
            <div class="container">
                <h1>Bienvenue sur le site !</h1>
                <p>Voici ton contenu principal...</p>
            </div>
        </main>
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
        
                    <div class="mb-3">
                        <label>Prénom</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
        
                    <div class="mb-3">
                        <label>Nom</label>
                        <input type="text" name="last_name" class="form-control">
                    </div>
        
                    <div class="mb-3">
                        <label>Pays</label>
                        <input type="text" name="country" class="form-control" required>
                    </div>
        
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
        
                    <div class="mb-3">
                        <label>Mot de passe</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
        
                    <div class="mb-3">
                        <label>Confirmation mot de passe</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                    <div class="text-center mt-3">
                      <p class="text-muted">Ou connecte-toi avec</p>
                      <a href="{{ route('auth.google') }}" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center">
                          <i class="fab fa-google me-2"></i> Continuer avec Google
                      </a>
                    </div>
                  
        
                    <button type="submit" class="btn btn-success w-100">Créer un compte</button>
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

                    <button type="submit" class="btn btn-primary w-100">Connexion</button>
                </form>
              </div>
            </div>
          </div>
        </div> 
        <footer>
          <div class="footer-copyright">
              <div class="container text-center">
                  <p class="text-white">
                      <strong>&copy; {{ date('Y') }} 9Un Global Services LLC </strong>
                       <a href="#">--Tous droits réservés.</a>
                  </p>
              </div>
          </div>
      </footer>
        {{-- Login Modal --}}
        <!-- JS -->
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
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        @if ($errors->any())
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
