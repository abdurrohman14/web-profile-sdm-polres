<div class="container my-5" data-aos="fade-left" data-aos-duration="3000">
    <div class="row">
      <div class="col-lg-6">
        <h2>Events</h2>
      </div>
    </div>

    <!-- Carousel Start -->
    <div id="eventCarousel" class="carousel slide mt-0" data-bs-ride="carousel">
      <!-- Indicators -->
      <!-- <div class="carousel-indicators">
        <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="3"></button>
      </div> -->

      <div class="carousel-inner mt-2">
        <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="row">
            @foreach($event as $events)
            <div class="col-md-3">
              <div class="card event-card h-100" style="width:100%; height:300px;">
                <img src="{{ asset('storage/event/'.$events->gambar) }}" class="card-img-top" style="height: 150px; object-fit: contain;" alt="Event Image" />
                <div class="card-body">
                  <a href="{{ route('lp.event.show', $events->id) }}" class="text-decoration-none text-dark"> <h5 class="card-title">{{ $events->judul }}</h5></a>
                  <p class="card-text">
                    <i class="bi bi-calendar"></i> {{ $events->created_at->locale('id')->translatedFormat('l, d F Y') }} <br />
                    {{-- <i class="bi bi-geo-alt"></i> London, UK --}}
                  </p>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>

      </div>

      <!-- Controls -->
      <!-- <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button> -->
    </div>

    <!-- View All Events Button -->
    <div class="text-center mt-4">
      <a href="{{ route('lp.event') }}" class="btn btn-warning fw-bold">Selengkapnya</a>
    </div>
  </div>