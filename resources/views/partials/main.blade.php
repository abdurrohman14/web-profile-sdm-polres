<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SDM - POLRES</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  </head>
  <body>
    <div class="container-fluid d-flex flex-column min-vh-100">
      <div class="row flex-grow-1">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <div class="col d-flex flex-column">
          <!-- navbar -->
          @include('partials.navbar')

          <!-- content -->
          <div class="row content flex-grow-1">
            @yield('content')
          </div>

          <!-- footer -->
          <div class="row">
            @include('partials.footer')
          </div>
        </div>
      </div>
    </div>

    <script>
      const sidebar = document.querySelectorAll(".sidebar");
      const burgerOpen = document.querySelector(".menu-open");
      const burgerClose = document.querySelector(".menu-close");
      const menuSidebar = document.querySelectorAll(".sidebar-hilang");
      const textSidebarNamaSekolah = document.querySelectorAll(".sidebar-hilang-nama-sekolah");
      const textDashboardMenu = document.querySelectorAll(".dashboard-menu");

      sidebar.forEach((element) => {
        element.style.display = "block";
      });
      burgerOpen.style.display = "none";

      function Open() {
        burgerOpen.style.display = "none";
        burgerClose.style.display = "block";
        sidebar.forEach((element) => {
          // element.style.display='block'
          element.style.transition = "width 0.5s ease";
          element.style.width = "255px";
        });
        menuSidebar.forEach((element) => {
          element.classList.remove("sidebar-hide");
          // element.style.display='block'
        });
        textSidebarNamaSekolah.forEach((element) => {
          element.classList.remove("sidebar-hide", "position-absolute");
          // element.style.display='block'
        });
        textDashboardMenu.forEach((e) => {
          e.style.display = "block";
        });
      }

      function Close() {
        burgerOpen.style.display = "block";
        burgerClose.style.display = "none";
        sidebar.forEach((element) => {
          // element.style.display='none'
          element.style.transition = "width 0.5s ease";
          element.style.width = "70px";
        });
        menuSidebar.forEach((element) => {
          element.classList.add("sidebar-hide");
          // element.style.display='none'
        });
        textSidebarNamaSekolah.forEach((element) => {
          element.classList.add("sidebar-hide", "position-absolute");
          // element.style.display='none'
        });
        textDashboardMenu.forEach((e) => {
          e.style.display = "none";
        });
      }

      burgerOpen.addEventListener("click", function () {
        Open();
      });
      burgerClose.addEventListener("click", function () {
        Close();
      });
    </script>

    <!-- Js -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <!-- Js Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- Sweet Alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>

    <script>
      $(document).ready(function () {
        $("#example").DataTable();
      });
    </script>
  </body>
</html>
