@php
    use Illuminate\Support\Facades\Auth;
    $isAdmin = Auth::check() && Auth::user()->email === 'camarabobas@gmail.com';
@endphp

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
        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
          @if ($isAdmin)
              {{-- Partie réservée à l’administrateur --}}
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
                          <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                              <b><i class="bi bi-graph-up-arrow"></i></b>
                              <p>Données Statistiques</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('premiums') }}" class="nav-link">
                              <b><i class="bi bi-gem" style="color:darkgoldenrod"></i></b>
                              <p>Premiums</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('users') }}" class="nav-link">
                              <b><i class="bi bi-people-fill" style="color:#eee"></i></b>
                              <p>Utilisateurs</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('transactions') }}" class="nav-link">
                              <b><i class="bi bi-cart-fill" style="color:#eee"></i></b>
                              <p>Transactions</p>
                          </a>
                      </li>
                  </ul>
              </li>
      
              <li class="nav-item">
                  <a href="#" class="nav-link active">
                      <i class="nav-icon bi bi-folder-fill" style="color:#eee"></i>
                      <p>Contenus<i class="nav-arrow bi bi-chevron-right" style="color:#eee"></i></p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('videos.index') }}" class="nav-link">
                              <i class="bi bi-camera-reels-fill" style="color:#eee"></i>
                              <p>Videos</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('audios.index') }}" class="nav-link">
                              <i class="fas fa-headphones" style="color:#eee"></i>
                              <p>Audios</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('pdf.index') }}" class="nav-link">
                              <i class="bi bi-filetype-pdf" style="color:#eee"></i>
                              <p>PDF</p>
                          </a>
                      </li>
                  </ul>
              </li>
      
              <li class="nav-item">
                  <a href="#" class="nav-link active">
                      <i class="bi bi-ui-checks-grid" style="color:#eee"></i>
                      <p>Articles<i class="nav-arrow bi bi-chevron-right" style="color:#eee"></i></p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('articles.index') }}" class="nav-link">
                              <i class="bi bi-bar-chart-line-fill" style="color:#eee"></i>
                              <p>Articles Trading</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('devs') }}" class="nav-link">
                              <i class="bi bi-code-slash" style="color:#eee"></i>
                              <p>Articles Programmation</p>
                          </a>
                      </li>
                  </ul>
              </li>
          @else
      
          {{-- Visible pour tous les utilisateurs connectés --}}
          <li class="nav-item">
              <a href="{{ route('paiements') }}" class="nav-link active">
                  <i class="bi bi-credit-card-fill" style="color:#eee"></i>
                  <p>Paiements</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{ route('downloads') }}" class="nav-link active">
                  <i class="bi bi-download" style="color:#eee"></i>
                  <p>Téléchargements</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('downloads') }}" class="nav-link active">
                <i class="bi bi-bar-chart-line-fill" style="color:#eee"></i>
                <p>Articles</p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('devs') }}" class="nav-link active">
              <i class="bi bi-code-slash" style="color:#eee"></i>
              <p>Programmation</p>
          </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('articles.index') }}" class="nav-link active">
            <i class="bi bi-bar-chart-line-fill" style="color:#eee"></i>
            <p> Trading</p>
        </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('pdf.index') }}" class="nav-link active">
          <i class="bi bi-filetype-pdf" style="color:#eee"></i>
          <p>PDF</p>
      </a>
    </li>
    @endif
      </ul>
 </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside> 
