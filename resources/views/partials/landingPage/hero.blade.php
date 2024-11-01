<!-- Hero Carousel -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($heroSlide as $index => $slide)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <img src="{{ asset('storage/hero/' . $slide->gambar) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}" />
            <div class="overlay"></div>
            <div class="carousel-caption mt-5">
                <h1>{{ $slide->judul }}</h1>
                <p>{{ $slide->deskripsi }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>