<section class="ourteams mt-5" style="height: 600px">
    <div class="container text-center mx-auto">
        <h2 class="text-center mb-4">Team</h2>
        <p class="text-center mb-5">Meet our esteemed educators who have made significant contributions to our institution.</p>
        @if ($ourteams->isNotEmpty())
            <div id="teamCarousel" class="carousel slide mx-auto" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($ourteams->chunk(3) as $key => $teamChunk)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <div class="row justify-content-center g-5">
                                @foreach ($teamChunk as $team)
                                    <div class="col-md-3">
                                        <div class="card team-card text-center bg-warning m-1 heavy-shadow" style="width: 100%; height: 350px; overflow: hidden;">
                                            <div class="card-img-top" style="background-image: url('{{ asset('storage/team/' . $team->gambar) }}'); background-size: cover; background-position: center; height: 100%;"></div>
                                            <div class="card-body bg-warning" style="height: auto;">
                                                <h5 class="card-title">{{ $team->nama }}</h5>
                                                <p class="card-text">{{ $team->jabatan->nama }} - {{ $team->pangkat->nama }}</p>
                                                <p class="card-text">{{ $team->nrp }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#teamCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#teamCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @else
            <div class="text-center">
                <h3>Belum Ada Team</h3>
                <p>Data untuk team belum tersedia.</p>
            </div>
        @endif
    </div>
</section>

<style>
.heavy-shadow {
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5); /* Adjust the values as needed */
}
</style>