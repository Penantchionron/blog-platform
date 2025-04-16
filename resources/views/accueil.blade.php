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

                            @else
                            @auth
    <li class="nav-item dropdown">
        <button type="button" class="btn btn-primary btn-sm nav-link dropdown-toggle d-flex align-items-center bg-transparent border-0"
              id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white ;font-weight:bold ; font-family:montserat;">
          
          <span class="d-none d-md-inline me-2">{{ Auth::user()->first_name }}</span>

          @if(Auth::user()->avatar)
              <img src="{{ asset(Auth::user()->avatar) }}" alt="Avatar"
                  class="rounded-circle me-2" width="40" height="40" style="object-fit: cover;">
          @else
              <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2"
                  style="width: 30px; height: 30px;">
                  <i class="bi bi-person-circle fs-4 text-secondary"></i>
              </div>
          @endif
        </button>
        <ul class="dropdown-menu dropdown-menu-end btn btn-primary btn-sm" aria-labelledby="userDropdown">
            <li  style="color:white ;font-weight:bold ; font-family:montserat;">
                <a class="dropdown-item" href="{{ route('modules.accueil') }}">
                   <b style="color:white; font-size: 1.2em;"> <i class="bi bi-speedometer2 me-2"></i> Dashboard</b>
                </a>
            </li>
            <li style="color:white ;font-weight:bold ; font-family:montserat;">
                 <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                <b style="color:white; font-size: 1.2em;" > <i class="bi bi-person-gear me-2"></i> Profil</b>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item text-danger" style="color:white ;font-weight:bold ; font-family:montserat;">
                    <b style="color:red;font-size: 1.2em;"><i class="bi bi-box-arrow-right me-2"></i> Déconnexion</b>
                    </button>
                </form>
            </li>
        </ul>
    </li>
      @endauth

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
        @include('profile.edit')
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
