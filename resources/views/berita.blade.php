<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

    <section class="news mt-5">
        <div class="container">
            <h2 class="text-center mb-4">Events</h2>
            <p class="text-center mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio
                vitae vestibulum vestibulum. Cras venenatis euismod malesuada. Mauris sit amet lacus ac orci faucibus
                dapibus. Duis quis sapien sed libero malesuada aliquam. </p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card news-card">
                        @foreach ($event as $evt)
                            <img src="{{ asset('storage/event/' . $evt->gambar) }}" class="card-img-top"
                                alt="News 1" />
                            <div class="card-body">
                                <h5 class="card-title">{{ $evt->judul }}</h5>
                                <p class="card-text">{!! $evt->deskripsi !!}</p>
                                <a href="#" class="btn btn-dark mt-4">Read More</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('assets1/image/sdm.png') }}" alt="Footer Logo" width="50px" />
                    <span>SDM POLRESTA</span>
                    <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor nisl ut eros
                        ullamcorper, vel dapibus est.</p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
