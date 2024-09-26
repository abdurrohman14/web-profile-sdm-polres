@extends('partials.landingPage.main')
@section('content')
<section class="news-detail mt-5">
    <div class="container">
        <div class="row">
            <!-- Kolom 1: Detail Berita -->
            <div class="col-md-8">
                <div class="card">
                    <!-- Menampilkan gambar berita -->
                    <img src="{{ asset('storage/berita/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}" />

                    <div class="card-body">
                        <!-- Judul berita -->
                        <h1 class="card-title">{{ $berita->judul }}</h1>

                        <!-- Tanggal dan waktu pembuatan berita -->
                        <p class="card-text">
                            <small class="text-muted">
                                Dipublikasikan pada: {{ $berita->created_at->locale('id')->translatedFormat('l, d F Y, H:i') }}
                            </small>
                        </p>

                        <!-- Isi deskripsi berita -->
                        <div class="card-text">
                            {!! $berita->deskripsi !!}
                        </div>

                        <!-- Kembali ke halaman berita -->
                        <div class="mt-4">
                            <a href="{{ route('lp.berita') }}" class="btn btn-secondary">Kembali ke Berita</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom 2: Berita Terkait -->
            <div class="col-md-4">
                <div class="related-news">
                    <h4>Berita Terkait</h4>
                    @if($beritaTerkait->isNotEmpty())
                        @foreach($beritaTerkait as $related)
                            <div class="related-news-item mb-4">
                                <!-- Link ke detail berita terkait -->
                                <a href="{{ route('lp.berita.show', $related->slug) }}" class="text-decoration-none">
                                    <div class="card">
                                        <img src="{{ asset('storage/berita/' . $related->gambar) }}" class="card-img-top" alt="{{ $related->judul }}" />
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $related->judul }}</h5>
                                            <p class="card-text">
                                                <small class="text-muted">
                                                    {{ $related->created_at->locale('id')->translatedFormat('l, d F Y') }}
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <p>Tidak ada berita terkait.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection