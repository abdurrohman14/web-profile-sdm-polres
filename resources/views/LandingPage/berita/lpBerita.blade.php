@extends('partials.landingPage.main')
@section('content')
<section class="news mt-5">
    <div class="container">
      <h2 class="text-center mb-4">News</h2>
      <p class="text-center mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras venenatis euismod malesuada. Mauris sit amet lacus ac orci faucibus dapibus. Duis quis sapien sed libero malesuada aliquam. </p>
      <div class="row">
        <div class="col-md-4">
          <div class="card news-card">
            @foreach($berita as $brt)
            <img src="{{ asset('storage/berita/' . $brt->gambar) }}" class="card-img-top" alt="News 1" />
            <div class="card-body">
              <h5 class="card-title">{{ $brt->judul }}</h5>
              {{-- <p class="card-text">{!! $brt->deskripsi !!}</p> --}}
              <p class="card-text">{{ $brt->created_at->locale('id')->translatedFormat('l, d F Y') }}</p>
              <a href="#" class="btn btn-dark mt-4">Read More</a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection