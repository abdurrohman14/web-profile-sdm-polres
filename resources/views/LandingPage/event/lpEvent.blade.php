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
            <div class="col-md-4 mb-4">
                <div class="card news-card">
                    <div class="image-container" style="position: relative;">
                        <a href="{{ route('lp.event.show', $evt->id) }}" class="text-decoration-none">
                            <img src="{{ asset('storage/event/' . $evt->gambar) }}" class="card-img-top" alt="{{ $evt->judul }}" />
                        </a>
                        <p class="date-overlay" style="position: absolute; bottom: 10px; right: 10px; background-color: rgba(0, 0, 0, 0.6); color: white; padding: 5px; border-radius: 3px;">
                            {{ $evt->created_at->locale('id')->translatedFormat('l, d F Y') }}
                        </p>
                    </div>
                    <div class="card-body bg-warning">
                        <a href="{{ route('lp.event.show', $evt->id) }}" class="text-decoration-none">
                            <h5 class="card-title">{{ $evt->judul }}</h5>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-md-12 text-center">
                <p>Belum ada acara tersedia.</p>
            </div>
            @endif
        </div>
        {{-- pagination --}}
        <div class="row justify-content-center mt-3">
            {{ $event->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>

@endsection
