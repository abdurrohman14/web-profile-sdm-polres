<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid mx-4 p-1">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('assets1/image/polri.png') }}" class="mb-2" alt="Logo" />
        <span class="ms-2 fs-4">SDM POLRESTA</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto fs-5">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('lp.berita') }}">Berita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('lp.event') }}">Acara</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
        <a class="btn btn-danger ms-lg-3" href="{{ route('login') }}">Login</a>
      </div>
    </div>
  </nav>