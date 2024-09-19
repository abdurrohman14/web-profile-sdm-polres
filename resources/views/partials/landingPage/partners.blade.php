<section class="partners mt-5">
    <div class="container">
      <h2 class="text-center mb-4">Partners</h2>
      @if($partners->isNotEmpty())
          <div id="partnersCarousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                  @foreach($partners->chunk(2) as $chunk)
                      <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                          <div class="d-flex justify-content-center">
                              @foreach($chunk as $partner)
                                  <img src="{{ asset('storage/partner/' . $partner->gambar) }}" class="d-block w-50" alt="{{ $partner->name }}" />
                              @endforeach
                          </div>
                      </div>
                  @endforeach
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#partnersCarousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#partnersCarousel" data-bs-slide="next">
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