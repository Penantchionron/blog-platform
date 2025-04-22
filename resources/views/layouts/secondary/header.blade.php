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
                                @php
                                $dashboardRoute = Auth::user()->email === 'camarabobas@gmail.com' ? route('admin.dashboard') : route('users.dashboard');
                               @endphp
                            @if ($dashboardRoute)
                            <a class="dropdown-item" href="{{ $dashboardRoute }}">
                                <b style="color:white; font-size: 1.2em;"> <i class="bi bi-speedometer2 me-2"></i> Dashboard</b>
                            </a>
                            @else
                            <a class="dropdown-item" href="{{ route('users.dashboard') }}">
                                <b style="color:white; font-size: 1.2em;"> <i class="bi bi-speedometer2 me-2"></i> Dashboard</b>
                            </a>
                            @endif
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
                                        <li><a href="{{ route('frontend.pdf') }}"><span class="text">Formations - PDF</span></a></li>
                                        <li><a href="{{ route('frontend.articles') }}"><span class="text">Articles</span></a></li>
                                        <li><a href="{{ route('frontend.videos') }}"><span class="text">Videos</span></a></li>
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

                        <li><a href="{{ route('frontend.articles') }}">Articles</a></li>

                        <li class="has-dropdown d-none">
                            <a href="#">Hacking & CyberSécurité</a>
                            <div class="dropdown-wrapper left-dropdown">
                                <div class="menu-box">
                                    <ul>
                                        <li><a href="#"><span class="text">PDFs</span></a></li>
                                        <li><a href="#"><span class="text">Videos</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li class="has-dropdown">
                            <a href="#">Développement Personnel</a>
                            <div class="dropdown-wrapper left-dropdown">
                                <div class="menu-box">
                                    <ul>
                                        <li><a href="{{ route('frontend.videos') }}"><span class="text">Videos</span></a></li>
                                        <li><a href="{{ route('frontend.audios') }}"><span class="text">Audios</span></a></li>
                                        <li><a href="#"><span class="frontend.pdfs">Éducation Financière</span></a></li>
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

 