<header id="main-header" class="header navbar-area bg-warning" style="height: 80px">
  <div class="container">
      <div class="row align-items-center">
          <div class="col-lg-12">
              <div class="nav-inner">
                  <!-- Start Navbar -->
                  <nav class="navbar navbar-expand-lg mt-2" style="width: 100%">
                      <!-- Logo on the left -->
                      <a class="navbar-brand" href="index.html">
                          <img src="{{asset('assets/img/sdm.png')}}" alt="Logo" class="img-fluid me-2">
                          <span>SDM POLRESTA BANYUWANGI</span>
                      </a>

                      <!-- Mobile Menu Button -->
                      <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                          aria-expanded="false" aria-label="Toggle navigation">
                          <span class="toggler-icon"></span>
                          <span class="toggler-icon"></span>
                          <span class="toggler-icon"></span>
                      </button>

                      <!-- Navbar Links -->
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <!-- Centering Nav Items -->
                          <ul id="nav" class="navbar-nav mx-auto text-dark">
                              <li class="nav-item mx-3">
                                  <a href="{{ url('/') }}" class="page-scroll active"
                                      aria-label="Toggle navigation">Home</a>
                              </li>
                              <li class="nav-item mx-3">
                                  <a href="{{ route('lp.berita') }}" class="page-scroll" aria-label="Toggle navigation">Berita</a>
                              </li>
                              <li class="nav-item mx-3">
                                  <a href="{{ route('lp.event') }}" class="page-scroll" aria-label="Toggle navigation">Acara</a>
                              </li>
                          </ul>
                      </div> <!-- navbar collapse -->

                      <!-- Button on the right -->
                      <div class="button add-list-button d-none d-lg-block">
                          <a href="{{ route('login') }}" class="btn btn-danger">Login</a>
                      </div>
                  </nav>
                  <!-- End Navbar -->
              </div>
          </div>
      </div> <!-- row -->
  </div> <!-- container -->
</header>