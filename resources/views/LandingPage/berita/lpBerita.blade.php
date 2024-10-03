@extends('partials.landingPage.main')
@section('content')
<section class="news mt-5">
    <div class="container">
      <h2 class="text-center mb-4">Berita</h2>
      <!-- Form Search -->
      <form action="{{ route('lp.berita.search') }}" method="GET" class="mb-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Cari berita..." value="{{ request()->input('query') }}">
                    <button class="btn btn-secondary" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
      </form>
      <div class="row">
        @if($berita->isNotEmpty())
          @foreach($berita as $brt)
          <div class="col-md-4 mb-4">
            <div class="card news-card">
              <div class="image-container" style="position: relative;">
                <a href="{{ route('lp.berita.show', $brt->slug) }}" class="text-decoration-none">
                  <img src="{{ asset('storage/berita/' . $brt->gambar) }}" class="card-img-top" alt="News 1" />
                </a>
                  <p class="date-overlay" style="position: absolute; bottom: 10px; right: 10px; background-color: rgba(0, 0, 0, 0.6); color: white; padding: 5px; border-radius: 3px;">
                  {{ $brt->created_at->locale('id')->translatedFormat('l, d F Y') }}
                </p>
              </div>
              <div class="card-body bg-warning">
                <a href="{{ route('lp.berita.show', $brt->slug) }}" class="text-decoration-none">
                  <h5 class="card-title">{{ $brt->judul }}</h5>
                </a>
              </div>
            </div>
          </div>
          @endforeach
        @else
        <div class="col-md-12 text-center">
          <p>Data berita belum tersedia</p>
        </div>
        @endif
      </div>
      <!-- Paginate links -->
      <div class="row justify-content-center mt-3">
        {{ $berita->links('pagination::bootstrap-5') }}
      </div>
    </div>
</section>
<script>
  $(document).ready(function() {
      $('#search').on('keyup', function() {
          var query = $(this).val();

          // AJAX request untuk pencarian berita
          $.ajax({
              url: "{{ route('lp.berita.search') }}",
              type: "GET",
              data: {query: query},
              success: function(data) {
                  // Mengganti konten berita dengan hasil pencarian
                  $('#news-container').html(data);
              }
          });
      });
  });
</script>
@endsection
