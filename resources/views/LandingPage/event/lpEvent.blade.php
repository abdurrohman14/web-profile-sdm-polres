@extends('partials.landingPage.main')
@section('content')

<section class="news mt-5">
    <div class="container">
        <h2 class="text-center mb-4">Acara</h2>
        <!-- Form Search -->
        <form action="{{ route('lp.event.search') }}" method="GET" class="mb-4">
          <div class="row justify-content-center">
              <div class="col-md-6">
                  <div class="input-group">
                      <input type="text" name="query" class="form-control" placeholder="Cari berita..." value="{{ request()->input('query') }}">
                      <button class="btn btn-primary" type="submit">Cari</button>
                  </div>
              </div>
          </div>
        </form>
        <div class="row">
          @if($event->isNotEmpty())
          @foreach($event as $evt)
          <div class="col-md-4">
            <div class="card news-card">
              <a href="{{ route('lp.event.show', $evt->id) }}">
              <img src="{{ asset('storage/event/' . $evt->gambar) }}" class="card-img-top" alt="News 1" />
            </a>
              <div class="card-body">
                <a href="{{ route('lp.event.show', $evt->id) }}" class="text-decoration-none">
                  <h5 class="card-title">{{ $evt->judul }}</h5>
                </a>
                {{-- <p class="card-text">{!! $evt->deskripsi !!}</p> --}}
                <p class="card-text">{{ $evt->created_at->locale('id')->translatedFormat('l, d F Y') }}</p>
              </div>
            </div>
          </div>
          @endforeach
          @else
          <div class="col-md-12 text-center">
            <p>belum ada event tersedia</p>
          </div>
          @endif
        </div>
        {{-- pagination --}}
        <div class="row justify-content-center mt-3">
            {{ $event->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>
<script>
  $(document).ready(function() {
      $('#search').on('keyup', function() {
          var query = $(this).val();

          // AJAX request untuk pencarian event
          $.ajax({
              url: "{{ route('lp.event.search') }}",
              type: "GET",
              data: {query: query},
              success: function(data) {
                  // Mengganti konten event dengan hasil pencarian
                  $('#news-container').html(data);
              }
          });
      });
  });
</script>
@endsection
