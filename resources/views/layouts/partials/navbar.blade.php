<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
       <!--User Icons-->
      <ul class="navbar-nav ms-auto">
        <!--begin::Fullscreen Toggle-->
        <li class="nav-item">
          <a class="nav-link" href="#" data-lte-toggle="fullscreen">
            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
          </a>
        </li>
        <!--end::Fullscreen Toggle-->
        <!--begin::User Menu Dropdown-->
        <li class="nav-item dropdown bg-black">
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
              <li style="color:white ;font-weight:bold ; font-family:montserat;">
                  <a class="dropdown-item" href="{{ route('accueil') }}">
                  <b style="color:white; font-size: 1.2em;" > <i  class="fas fa-arrow-left"></i> Retour</b>
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
        <!--end::User Menu Dropdown-->
      </ul>
      <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>