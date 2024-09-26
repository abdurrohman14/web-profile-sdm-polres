@extends('partials.landingPage.main')
@section('content')
{{-- resources/views/LandingPage/berita/partials/newsList.blade.php --}}
@if($berita->isNotEmpty())
    @foreach($berita as $brt)
        <div class="col-md-4">
            <div class="card news-card">
                <a href="{{ route('lp.berita.show', $brt->slug) }}">
                    <img src="{{ asset('storage/berita/' . $brt->gambar) }}" class="card-img-top" alt="News 1" />
                </a>
                <div class="card-body">
                    <a href="{{ route('lp.berita.show', $brt->slug) }}" class="text-decoration-none">
                        <h5 class="card-title">{{ $brt->judul }}</h5>
                    </a>
                    <p class="card-text">{{ $brt->created_at->locale('id')->translatedFormat('l, d F Y') }}</p>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="col-md-12 text-center">
        <p>Belum ada berita tersedia.</p>
    </div>
@endif

@endsection