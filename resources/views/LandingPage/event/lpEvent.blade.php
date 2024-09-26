@extends('partials.landingPage.main')
@section('content')

<section class="news mt-5">
    <div class="container">
        <h2 class="text-center mb-4">Acara</h2>
        <div class="row">
            @foreach ($event as $evt)
            <div class="col-md-4 mb-4">
                <div class="card news-card">
                    <img src="{{ asset('storage/event/' . $evt->gambar) }}" class="card-img-top" alt="Event Image" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $evt->judul }}</h5>
                        <p class="card-text">{!! $evt->deskripsi !!}</p>
                        <a href="#" class="btn btn-dark mt-4">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
