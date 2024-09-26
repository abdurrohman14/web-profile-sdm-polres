<section class="ourteams mt-5" style="height: 500px">
    <div class="container text-center mx-auto">
        <h2 class="text-center mb-4">Tim Kami</h2>
        @if ($ourteams->isNotEmpty())
            <div id="teamCarousel" class="carousel slide mx-auto" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($ourteams->chunk(2) as $key => $teamChunk)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <div class="row justify-content-center">
                                @foreach ($teamChunk as $team)
                                    <div class="col-md-3 mx-auto">
                                        <div class="card team-card text-center">
                                            <img src="{{ asset('storage/team/' . $team->gambar) }}"
                                                class="card-img-top rounded-circle mx-auto mt-3"
                                                alt="{{ $team->nama }}" style="width: 150px;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $team->nama }}</h5>
                                                <p class="card-text">{{ $team->jabatan->nama }} -
                                                    {{ $team->pangkat->nama }}</p>
                                                <p class="card-text">{{ $team->nrp }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#teamCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#teamCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @else
            <div class="text-center">
                <h3>Belum Ada Tim</h3>
                <p>Data untuk team belum tersedia.</p>
            </div>
        @endif
    </div>
</section>
