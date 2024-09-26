@extends('partials.landingPage.main')
@section('content')
<section class="news-detail mt-5">
    <div class="container">
        <div class="row">
            <!-- Kolom 1: Detail event -->
            <div class="col-md-8">
                <div class="card">
                    <!-- Menampilkan gambar event -->
                    <img src="{{ asset('storage/event/' . $event->gambar) }}" class="card-img-top" alt="{{ $event->judul }}" />

                    <div class="card-body">
                        <!-- Judul event -->
                        <h1 class="card-title">{{ $event->judul }}</h1>

                        <!-- Tanggal dan waktu pembuatan event -->
                        <p class="card-text">
                            <small class="text-muted">
                                Dipublikasikan pada: {{ $event->created_at->locale('id')->translatedFormat('l, d F Y, H:i') }}
                            </small>
                        </p>

                        <!-- Isi deskripsi event -->
                        <div class="card-text">
                            {!! $event->deskripsi !!}
                        </div>

                        <!-- Kembali ke halaman event -->
                        <div class="mt-4">
                            <a href="{{ route('lp.event') }}" class="btn btn-secondary">Kembali ke event</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom 2: event Terkait -->
            <div class="col-md-4">
                <div class="related-news">
                    <h4>event Terkait</h4>
                    @if($eventTerkait->isNotEmpty())
                        @foreach($eventTerkait as $related)
                            <div class="related-news-item mb-4">
                                <!-- Link ke detail event terkait -->
                                <a href="{{ route('lp.event.show', $related->id) }}" class="text-decoration-none">
                                    <div class="card">
                                        <img src="{{ asset('storage/event/' . $related->gambar) }}" class="card-img-top" alt="{{ $related->judul }}" />
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
                        <p>Tidak ada event terkait.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection