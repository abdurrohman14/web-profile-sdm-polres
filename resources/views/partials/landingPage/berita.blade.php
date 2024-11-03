<div class="container my-5">
    <h2 class="text-center" data-aos="fade-down" data-aos-duration="2000">Berita</h2>
    <hr class="custom-hr mb-4" data-aos="fade-left" data-aos-duration="2000" />
    @if ($berita && $berita->isNotEmpty())
    <div class="row">
      <!-- Course Card -->
      @foreach($berita as $brt)
      <div class="col-md-4">
        <div class="card" data-aos="fade-up" data-aos-duration="2000">
          <img src="{{ asset('storage/berita/'. $brt->gambar) }}" class="card-img-top" style="height: 300px; object-fit: cover;" alt="Course Image" />
          <div class="card-body">
            <a href="{{ route('lp.berita.show', $brt->slug) }}" class="text-decoration-none text-dark"><h5 class="card-title">{{ $brt->judul }}</h5></a>
            <p class="card-text"><i class="bi bi-calendar"></i> {{ $brt->created_at->locale('id')->translatedFormat('l, d F Y') }} <br /></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @else
        <p class="text-center">Tidak ada berita tersedia saat ini.</p>
    @endif
    <!-- View All Courses Button -->
    <div class="text-center mt-4">
      <a href="{{ route('lp.berita') }}" class="btn btn-warning fw-bold">Selengkapnya</a>
    </div>
  </div>