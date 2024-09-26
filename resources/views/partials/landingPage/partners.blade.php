<section class="partners mt-5" style="height: 500px; display: flex; align-items: center;">
    <div class="container text-center mx-auto">
        <h2 class="text-center mb-4">Our Partners</h2>
        <p class="text-center mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio
            vitae vestibulum vestibulum. Cras venenatis euismod malesuada. Mauris sit amet lacus ac orci faucibus
            dapibus. Duis quis sapien sed libero malesuada aliquam. </p>
        @if ($partners->isNotEmpty())
            <div id="partnersCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($partners->chunk(2) as $chunk)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="d-flex justify-content-center">
                                @foreach ($chunk as $partner)
                                    <img src="{{ asset('storage/hero/' . $partner->gambar) }}" class="d-block w-50"
                                        alt="{{ $partner->name }}" />
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#partnersCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#partnersCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @else
            <div class="text-center">
                <h3>Belum Ada Partner</h3>
                <p>Data untuk partner belum tersedia.</p>
            </div>
        @endif
    </div>
</section>
