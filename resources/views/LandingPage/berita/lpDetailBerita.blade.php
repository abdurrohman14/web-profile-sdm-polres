@extends('partials.landingPage.main')
@section('content')
<section class="news-detail">
    <div class="container">
        <div class="row">
            <!-- Kolom 1: Detail Berita -->
            <div class="col-md-8">
                <div class="card">
                    <!-- Menampilkan gambar berita -->
                    <img src="{{ asset('storage/berita/' . $beritass->gambar) }}" class="card-img-top" style="height: 300px; width: auto; object-fit: contain;" alt="{{ $beritass->judul }}" />

                    <div class="card-body">
                        <!-- Judul beritass -->
                        <h1 class="card-title">{{ $beritass->judul }}</h1>

                        <!-- Tanggal dan waktu pembuatan berita -->
                        <p class="card-text">
                            <small class="text-muted">
                                Dipublikasikan pada : {{ $beritass->created_at->locale('id')->translatedFormat('l, d F Y, H:i') }}
                            </small>
                        </p>

                        <!-- Isi deskripsi beritass -->
                        <div class="card-text">
                            {!! $beritass->deskripsi !!}
                        </div>

                        <div class="row">
                            @if($beritass->dokumentasi && json_decode($beritass->dokumentasi))
                                @foreach(json_decode($beritass->dokumentasi) as $image)
                                    <div class="col-md-4 col-6 mb-2">
                                        <img src="{{ asset('storage/berita/dokumentasi/' . $image) }}" alt="Dokumentasi" class="img-fluid rounded" width="100px">
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted">Tidak ada dokumentasi tersedia</p>
                            @endif
                        </div>

                        <!-- Kembali ke halaman berita -->
                        {{-- <div class="mt-4">
                            <a href="{{ route('lp.berita') }}" class="btn btn-secondary">Kembali ke Berita</a>
                        </div> --}}
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
                                        <img src="{{ asset('storage/berita/' . $related->gambar) }}" class="card-img-top" style="height: 200px; width: auto; object-fit: contain;" alt="{{ $related->judul }}" />
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