@extends('partials.landingPage.main')
@section('content')
<section class="news mt-5">
    <div class="container">
      <h2 class="text-center mb-4">Berita</h2>
      <div class="row">
        @foreach($berita as $brt)
        <div class="col-md-4 mb-4">
          <div class="card news-card">
            <div class="image-container" style="position: relative;">
              <img src="{{ asset('storage/berita/' . $brt->gambar) }}" class="card-img-top" alt="News 1" />
              <p class="date-overlay" style="position: absolute; bottom: 10px; right: 10px; background-color: rgba(0, 0, 0, 0.6); color: white; padding: 5px; border-radius: 3px;">
                {{ $brt->created_at->locale('id')->translatedFormat('l, d F Y') }}
              </p>
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ $brt->judul }}</h5>
              <p class="card-text">{!! $brt->deskripsi !!}</p>
              <a href="#" class="btn btn-dark mt-4">Read More</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
