@extends('partials.landingPage.main')
@section('content')

    

<section class="news mt-5">
    <div class="container">
        <h2 class="text-center mb-4">Events</h2>
        <p class="text-center mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio
            vitae vestibulum vestibulum. Cras venenatis euismod malesuada. Mauris sit amet lacus ac orci faucibus
            dapibus. Duis quis sapien sed libero malesuada aliquam. </p>
        <div class="row">
            <div class="col-md-4">
                <div class="card news-card">
                    @foreach ($event as $evt)
                        <img src="{{ asset('storage/event/' . $evt->gambar) }}" class="card-img-top"
                            alt="News 1" />
                        <div class="card-body">
                            <h5 class="card-title">{{ $evt->judul }}</h5>
                            <p class="card-text">{!! $evt->deskripsi !!}</p>
                            <a href="#" class="btn btn-dark mt-4">Read More</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection