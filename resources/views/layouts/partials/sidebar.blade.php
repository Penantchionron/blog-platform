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
                <a href="./index.html" class="nav-link active">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('adminlte/pages/index2.html')}}"class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>
    
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-box-seam-fill"></i>
              <p>
                Widgets
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ asset('adminlte/pages/widgets/small-box.html')}}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Small Box</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./widgets/info-box.html" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>info Box</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./widgets/cards.html" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Cards</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-clipboard-fill"></i>
              <p>
                Contenus
                <span class="nav-badge badge text-bg-secondary me-3">6</span>
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./layout/unfixed-sidebar.html" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Videos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./layout/fixed-sidebar.html" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>PDF</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./layout/layout-custom-area.html" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Paiements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./layout/sidebar-mini.html" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Télechargements</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-ui-checks-grid"></i>
              <p>
                Articles
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./docs/components/main-header.html" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Articles Trading</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./docs/components/main-sidebar.html" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Articles Programmation</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="./docs/faq.html" class="nav-link">
              <i class="nav-icon bi bi-question-circle-fill"></i>
              <p>FAQ</p>
            </a>
          </li>
        </li>
        <!--end::Sidebar Menu-->
      </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside> 
