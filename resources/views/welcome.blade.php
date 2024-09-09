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
  </head>
  <body>
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
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('berita') }}">Berita</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/acara">Acara</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
          <a class="btn btn-danger ms-lg-3" href="{{ route('login') }}">Login</a>
        </div>
      </div>
    </nav>

    <section class="hero">
      <div class="container">
        <div class="row">
          @if($hero)
                <div class="col-md-6">
                    <h1>{{ $hero->judul }}</h1>
                    <p>{{ $hero->deskripsi }}</p>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="{{ asset('storage/hero/' . $hero->gambar) }}" alt="Hero Image" width="200px"/>
                </div>
            @else
                <div class="col-md-12">
                    <h1>Belum Ada Data</h1>
                    <p>Data untuk hero section belum tersedia.</p>
                </div>
            @endif
        </div>
      </div>
    </section>

    <section class="partners mt-5">
      <div class="container">
        <h2 class="text-center mb-4">Our Partners</h2>
        <p class="text-center mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras venenatis euismod malesuada. Mauris sit amet lacus ac orci faucibus dapibus. Duis quis sapien sed libero malesuada aliquam. </p>
        @if($partners->isNotEmpty())
            <div id="partnersCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($partners->chunk(2) as $chunk)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="d-flex justify-content-center">
                                @foreach($chunk as $partner)
                                    <img src="{{ asset('storage/hero/' . $partner->gambar) }}" class="d-block w-50" alt="{{ $partner->name }}" />
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#partnersCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#partnersCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @else
            <div class="text-center">
                <h3>Belum Ada Partner</h3>
                <p>Data untuk partner belum tersedia.</p>
            </div>
        @endif
      </div>
    </section>

    <section class="ourteams mt-5">
      <div class="container">
          <h2 class="text-center mb-4">Our Team</h2>
          <p class="text-center mb-5">Meet our esteemed educators who have made significant contributions to our institution.</p>
          @if($ourteams->isNotEmpty())
          <div id="teamCarousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                  @foreach($ourteams->chunk(2) as $key => $teamChunk)
                      <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                          <div class="row justify-content-center">
                              @foreach($teamChunk as $team)
                                  <div class="col-md-3">
                                      <div class="card team-card text-center">
                                          <img src="{{ asset('storage/team/' . $team->gambar) }}" class="card-img-top rounded-circle mx-auto mt-3" alt="{{ $team->nama }}" style="width: 150px;">
                                          <div class="card-body">
                                              <h5 class="card-title">{{ $team->nama }}</h5>
                                              <p class="card-text">{{ $team->jabatan->nama }} - {{ $team->pangkat->nama }}</p>
                                              <p class="card-text">{{ $team->nrp }}</p>
                                          </div>
                                      </div>
                                  </div>
                              @endforeach
                          </div>
                      </div>
                  @endforeach
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#teamCarousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#teamCarousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
              </button>
          </div>
          @else
            <div class="text-center">
                <h3>Belum Ada Team</h3>
                <p>Data untuk team belum tersedia.</p>
            </div>
          @endif
      </div>
  </section>
  

    <footer class="footer mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <img src="{{ asset('assets1/image/sdm.png') }}" alt="Footer Logo" width="50px" />
            <span>SDM POLRESTA</span>
            <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor nisl ut eros ullamcorper, vel dapibus est.</p>
          </div>
          <div class="col-md-3">
            <h5>Quick Links</h5>
            <ul class="list-unstyled">
              <li><a class="nav-link" href="#">Home</a></li>
              <li><a class="nav-link" href="#">About</a></li>
              <li><a class="nav-link" href="#">Services</a></li>
              <li><a class="nav-link" href="#">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h5>More Links</h5>
            <ul class="list-unstyled">
              <li><a class="nav-link" href="#">Privacy Policy</a></li>
              <li><a class="nav-link" href="#">Terms of Service</a></li>
              <li><a class="nav-link" href="#">Careers</a></li>
              <li><a class="nav-link" href="#">Support</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h5>Follow Us</h5>
            <div class="social-icons">
              <a href="#" target="_blank"><i class="bi bi-facebook fs-1 me-3"></i></a>
              <a href="#" target="_blank"><i class="bi bi-envelope-fill fs-1 me-3"></i></a>
              <a href="#" target="_blank"><i class="bi bi-instagram fs-1 me-3"></i></a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
