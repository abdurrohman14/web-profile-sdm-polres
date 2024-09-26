<section class="hero bg-warning" style="height: 750px">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            @if ($hero)
                <div class="col-md-6 text-center">
                    <h1>{{ $hero->judul }}</h1>
                    <p>{{ $hero->deskripsi }}</p>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="{{ asset('storage/hero/' . $hero->gambar) }}" alt="Hero Image" width="200px" />
                </div>
            @else
                <div class="col-md-12 text-center">
                    <h1>Belum Ada Data</h1>
                    <p>Data untuk hero section belum tersedia.</p>
                </div>
            @endif
        </div>
    </div>
</section>