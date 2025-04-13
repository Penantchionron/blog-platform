<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Dashboard</title>
      <!--begin::Primary Meta Tags-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta name="title" content="ADashboard" />
      <meta name="author" content="9Un Global Services LLC " />
      <meta
        name="description"
        content="9Un Global Services LLC est une entreprise de logicielle et une plateforme."
      />
      <meta
        name="keywords"
        content=" Trading, Developpement web, Developpement Mobile,Analyse"
      />
      <!--end::Primary Meta Tags-->
      <!--begin::Fonts-->
      <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous"/>
      <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
        crossorigin="anonymous"/>
      <!--end::Third Party Plugin(OverlayScrollbars)-->
      <!--begin::Third Party Plugin(Bootstrap Icons)-->
      <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
        crossorigin="anonymous"
      />
      <!--end::Third Party Plugin(Bootstrap Icons)-->
      <!--begin::Required Plugin(AdminLTE)-->
      <link rel="stylesheet" href="../../dist/css/adminlte.css" />
      <!--end::Required Plugin(AdminLTE)-->
      <!-- apexcharts -->
      <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
        crossorigin="anonymous"
      />
      <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}">

      <!-- Font Awesome (CDN) -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

      <!-- Bootstrap 5 CSS (CDN) -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
        integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
        crossorigin="anonymous" />
        <style>      
                          html, body {
                              height: 100%;
                              margin: 0;
                              padding: 0;
                              overflow: hidden; /* empêche le scroll général */
                          }

                          /* Fixe la navbar */
                          .main-header {
                              position: fixed;
                              top: 0;
                              left: 0;
                              right: 0;
                              height: 57px;
                              z-index: 1030;
                          }

                          /* Fixe la sidebar */
                          .main-sidebar {
                              position: fixed;
                              top: 57px;
                              bottom: 40px;
                              left: 0;
                              width: 250px; /* largeur par défaut AdminLTE */
                              overflow-y: auto;
                          }

                          /* Fixe le footer */
                          .main-footer {
                              position: fixed;
                              bottom: 0;
                              left: 0;
                              right: 0;
                              height: 40px;
                              z-index: 1020;
                              background: #f4f6f9;
                              border-top: 1px solid #dee2e6;
                            
                          }

                          /* Le wrapper central prend tout l’espace entre header/footer */
                          .content-wrapper {
                              position: absolute;
                              top: 57px; /* sous la navbar */
                              left: 250px; /* après la sidebar */
                              right: 0;
                              bottom: 40px; /* au-dessus du footer */
                              overflow-y: auto;
                              padding: 1rem;
                              background-color: #fff;
                          }

        </style>
      @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/theme.js'])
      @stack('styles')
  </head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
  <div class="app-wrapper">
      @include('layouts.partials.navbar')

      {{-- SIDEBAR --}}
      @include('layouts.partials.sidebar')
      <div class="content-wrapper">
        @yield('content')
      </div>
      {{-- FOOTER --}}
      @include('layouts.partials.footer')
  </div>
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../../dist/js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
       document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("themeToggle");
    const sidebar = document.getElementById("sidebar");

    // Charger le thème sauvegardé (localStorage)
    const savedTheme = localStorage.getItem("sidebar-theme");
    if (savedTheme) {
      sidebar.setAttribute("data-bs-theme", savedTheme);
      toggle.checked = savedTheme === "dark";
    }

    // Événement de changement
    toggle.addEventListener("change", function () {
      const newTheme = toggle.checked ? "dark" : "light";
      sidebar.setAttribute("data-bs-theme", newTheme);
      localStorage.setItem("sidebar-theme", newTheme);
    });
  });
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- sortablejs -->
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ="
      crossorigin="anonymous"
    ></script>
    <!-- sortablejs -->
    <script>
      const connectedSortables = document.querySelectorAll('.connectedSortable');
      connectedSortables.forEach((connectedSortable) => {
        let sortable = new Sortable(connectedSortable, {
          group: 'shared',
          handle: '.card-header',
        });
      });

      const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
      cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
      });
    </script>
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>
    <!-- ChartJS -->
    <script>
      // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
      // IT'S ALL JUST JUNK FOR DEMO
      // ++++++++++++++++++++++++++++++++++++++++++

      const sales_chart_options = {
        series: [
          {
            name: 'Digital Goods',
            data: [28, 48, 40, 19, 86, 27, 90],
          },
          {
            name: 'Electronics',
            data: [65, 59, 80, 81, 56, 55, 40],
          },
        ],
        chart: {
          height: 300,
          type: 'area',
          toolbar: {
            show: false,
          },
        },
        legend: {
          show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth',
        },
        xaxis: {
          type: 'datetime',
          categories: [
            '2023-01-01',
            '2023-02-01',
            '2023-03-01',
            '2023-04-01',
            '2023-05-01',
            '2023-06-01',
            '2023-07-01',
          ],
        },
        tooltip: {
          x: {
            format: 'MMMM yyyy',
          },
        },
      };

      const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options,
      );
      sales_chart.render();
    </script>
    <!-- jsvectormap -->
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
      integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
      integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY="
      crossorigin="anonymous"
    ></script>
    <!-- jsvectormap -->
    <script>
      const visitorsData = {
        US: 398, // USA
        SA: 400, // Saudi Arabia
        CA: 1000, // Canada
        DE: 500, // Germany
        FR: 760, // France
        CN: 300, // China
        AU: 700, // Australia
        BR: 600, // Brazil
        IN: 800, // India
        GB: 320, // Great Britain
        RU: 3000, // Russia
      };

      // World map by jsVectorMap
      const map = new jsVectorMap({
        selector: '#world-map',
        map: 'world',
      });

      // Sparkline charts
      const option_sparkline1 = {
        series: [
          {
            data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline1 = new ApexCharts(document.querySelector('#sparkline-1'), option_sparkline1);
      sparkline1.render();

      const option_sparkline2 = {
        series: [
          {
            data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline2 = new ApexCharts(document.querySelector('#sparkline-2'), option_sparkline2);
      sparkline2.render();

      const option_sparkline3 = {
        series: [
          {
            data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
          },
        ],
        chart: {
          type: 'area',
          height: 50,
          sparkline: {
            enabled: true,
          },
        },
        stroke: {
          curve: 'straight',
        },
        fill: {
          opacity: 0.3,
        },
        yaxis: {
          min: 0,
        },
        colors: ['#DCE6EC'],
      };

      const sparkline3 = new ApexCharts(document.querySelector('#sparkline-3'), option_sparkline3);
      sparkline3.render();
    </script>
     <!-- jQuery (CDN) -->
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

     <!-- Bootstrap Bundle JS (CDN) -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
     <script src="{{ asset('adminlte/js/adminlte.js') }}"></script>
     <script>
      const themeToggle = document.getElementById('themeToggle');
      const sidebar = document.getElementById('sidebar');
      const themeIcon = document.getElementById('themeIcon');
    
      // Applique les styles en fonction du thème
      function applyTheme(theme) {
        if (theme === 'dark') {
          document.body.classList.add('dark-mode');
          sidebar.setAttribute('data-bs-theme', 'dark');
          themeToggle.checked = true;
          themeIcon.style.color = 'yellow';
        } else {
          document.body.classList.remove('dark-mode');
          sidebar.setAttribute('data-bs-theme', 'light');
          themeToggle.checked = false;
          themeIcon.style.color = 'blue';
        }
      }
    
      // Charger le thème actuel depuis localStorage
      const currentTheme = localStorage.getItem('theme') || 'light';
      applyTheme(currentTheme);
    
      // Gérer le changement de thème
      themeToggle.addEventListener('change', () => {
        const newTheme = themeToggle.checked ? 'dark' : 'light';
        localStorage.setItem('theme', newTheme);
        applyTheme(newTheme);
      });
    </script>
     @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/theme.js'])
     @stack('scripts')
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
