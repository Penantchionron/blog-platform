<aside class="app-sidebar bg-body-secondary shadow" id="sidebar" data-bs-theme="{{ session('dark', 'light') }}">
  <div class="sidebar-brand d-flex justify-content-between align-items-center px-3 py-2">
    <a href="/dashboard" id="themeToggleLink" class="brand-link">
      <span class="brand-text fw-light"><b>9Un Global Services LLC</b></span>
    </a>
  </div>
  <!-- Light/Dark Toggle -->
  <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" id="themeToggle">
    <label class="form-check-label" for="themeToggle">
      <i class="bi bi-moon-stars" id="themeIcon"></i>
    </label>
  </div>
 
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
      <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
          class="nav sidebar-menu flex-column"
          data-lte-toggle="treeview"
          role="menu"
          data-accordion="false"
        >
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon bi bi-speedometer"></i>
              <p>
                Dashboard
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('modules.accueil') }}" class="nav-link active">
                 <b> <i class="bi bi-graph-up-arrow"></i></b>
                  <p>Données Statistiques</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('premiums') }}"class="nav-link">
                 <b><i class="bi bi-gem " style="color:darkgoldenrod"></i></b> 
                  <p>Premiums</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users') }}" class="nav-link">
                  <b><i class="bi bi-people-fill" style="color:rgb(238, 242, 242)"></i></b>
                  <p>Utilisateurs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('transactions') }}" class="nav-link">
                  <b><i class="bi bi-cart-fill"  style="color:rgb(238, 242, 242)"></i></b>
                  <p>Transactions</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon bi bi-folder-fill"  style="color:rgb(238, 242, 242)"></i>
              <p>
                Contenus
                <span class="nav-badge badge text-bg-secondary me-3">6</span>
                <b><i class="nav-arrow bi bi-chevron-right"  style="color:rgb(238, 242, 242)"></i></b>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('videos') }}" class="nav-link">
                  <b> <i class="nav-icon bi bi-camera-reels-fill"  style="color:rgb(238, 242, 242)"></i></b>
                  <p>Videos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('pdf') }}" class="nav-link">
                  <b> <i class="nav-icon bi bi-filetype-pdf" style="color:rgb(238, 242, 242)"></i></b>
                  <p>PDF</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('paiements') }}" class="nav-link">
                  <b><i class="nav-icon bi bi-credit-card-fill"  style="color:rgb(238, 242, 242)"></i></b>
                  <p>Paiements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('downloads') }}" class="nav-link">
                  <b><i class="nav-icon bi bi-download" style="color:rgb(238, 242, 242)"></i></b>
                  <p>Télechargements</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
             <b> <i class="nav-icon bi bi-ui-checks-grid"  style="color:rgb(238, 242, 242)"></i></b>
              <p>
                Articles
                <i class="nav-arrow bi bi-chevron-right"  style="color:rgb(238, 242, 242)"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('articles') }}" class="nav-link">
                  <i class="nav-icon bi bi-bar-chart-line-fill"style="color:rgb(238, 242, 242)"></i>
                  <p>Articles Trading</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('devs') }}" class="nav-link">
                  <i class="nav-icon bi bi-code-slash" style="color:rgb(238, 242, 242)"></i>
                  <p>Articles Programmation</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('faq.accueil') }}" class="nav-link">
              <i class="nav-icon bi bi-question-circle-fill"  style="color:rgb(238, 242, 242)"></i>
              <p>FAQ</p>
            </a>
          </li>
        </li>
        <!--end::Sidebar Menu-->
      </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside> 
