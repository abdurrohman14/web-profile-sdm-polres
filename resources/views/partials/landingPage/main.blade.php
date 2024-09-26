<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('assets1/css/home.css') }}">
    <style>
      body {
          font-family: 'Poppins', sans-serif;
          padding-top: 70px; /* Adjust based on header height */
          background-color:#f9f9f9;
      }
  
      .header {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          z-index: 1000;
          box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
          transition: background-color 0.3s; /* Smooth transition for background color */
      }
  
      .header-scrolled {
          background-color: #ffffff !important; /* White background color */
          color: #000000; /* Optional: Change text color to black for better readability */
      }
  </style>
  </head>
  <body>
    @include('partials.landingPage.navbar')

    @yield('content')

    @includeWhen(isset($hero), 'partials.landingPage.hero')
    @includeWhen(isset($partners), 'partials.landingPage.partners')
    @includeWhen(isset($ourteams), 'partials.landingPage.team')

    @include('partials.landingPage.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
          const header = document.getElementById('main-header');
          const scrollThreshold = 50; // Scroll threshold to add class
  
          window.addEventListener('scroll', function () {
              if (window.scrollY > scrollThreshold) {
                  header.classList.add('header-scrolled');
              } else {
                  header.classList.remove('header-scrolled');
              }
          });
      });
  </script>
  </body>
</html>
