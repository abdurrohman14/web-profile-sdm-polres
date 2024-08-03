@php
  $user = auth()->user();
@endphp

<div class="sidebar">
    <ul class="nav flex-column">
      <li class="nav-item logo-nama-sekolah fw-bold d-flex align-items-center justify-content-center">
        <img src="{{ asset('assets/image/sdm.png') }}" class="logo" alt="Logo SDM" />
        <span class="sidebar-hilang-nama-sekolah mt-1 nama-sekolah">SDM POLRESTA</span>
      </li>
      <hr />
      <li class="nav-item fw-semibold dashboard-menu">
        <span class="sidebar-hilang"> Dashboard Menu </span>
      </li>
      @if ($user->role === \App\Models\User::ROLE_SUPERADMIN)
      <li class="nav-item fw-semibold pilihan-sidebar card shadow bg-light text-dark">
        <a class="nav-link text-dark" href="/">
          <i class="bi bi-house menu-sidebar"></i>
          <span class="sidebar-hilang">Dashboard</span>
        </a>
      </li>
      <li class="nav-item mt-1 fw-semibold">
        <a class="nav-link text-white" href="Jabatan.html">
          <i class="bi bi-shield-fill-check menu-sidebar"></i>
          <span class="sidebar-hilang">Jabatan</span>
        </a>
      </li>
      <li class="nav-item mt-1 fw-semibold">
        <a class="nav-link text-white" href="Ourteam.html">
          <i class="bi bi-people-fill menu-sidebar"></i>
          <span class="sidebar-hilang">Ourteam</span>
        </a>
      </li>
      <li class="nav-item mt-1 fw-semibold">
        <a class="nav-link text-white" href="Partner.html">
          <i class="bi bi-people-fill menu-sidebar"></i>
          <span class="sidebar-hilang">Partner</span>
        </a>
      </li>
      <li class="nav-item mt-1 fw-semibold">
        <a class="nav-link text-white" href="Personel.html">
          <i class="bi bi-person-fill menu-sidebar"></i>
          <span class="sidebar-hilang">Personel</span>
        </a>
      </li>
      @elseif ($user->role === \App\Models\User::ROLE_ADMIN)
      <li class="nav-item mt-1 fw-semibold">
        <a class="nav-link text-white" href="Staf.html">
          <i class="bi bi-people-fill menu-sidebar"></i>
          <span class="sidebar-hilang">Personel</span>
        </a>
      </li>
      {{-- <li class="nav-item mt-1 fw-semibold">
        <a class="nav-link text-white" href="Berita.html">
          <i class="bi bi-newspaper menu-sidebar"></i>
          <span class="sidebar-hilang">Berita</span>
        </a>
      </li>
      <li class="nav-item mt-1 fw-semibold">
        <a class="nav-link text-white" href="Galeri.html">
          <i class="bi bi-image menu-sidebar"></i>
          <span class="sidebar-hilang">Galeri</span>
        </a>
      </li>
      <li class="nav-item mt-1 fw-semibold">
        <a class="nav-link text-white" href="Download.html">
          <i class="bi-download menu-sidebar"></i>
          <span class="sidebar-hilang">Download</span>
        </a>
      </li>
      <li class="nav-item mt-1 fw-semibold">
        <a class="nav-link text-white" href="Slideshow.html">
          <i class="bi-window-stack menu-sidebar"></i>
          <span class="sidebar-hilang">Slideshow</span>
        </a>
      </li> --}}
      @elseif ($user->role === \App\Models\User::ROLE_PERSONIL)
      <li class="nav-item mt-1 fw-semibold">
        <a class="nav-link text-white" href="Kategori.html">
          <i class="bi bi-person-fill menu-sidebar"></i>
          <span class="sidebar-hilang">Data Diri</span>
        </a>
      </li>
      @endif
    </ul>
    <div class="mt-auto"></div>
    <!-- this will push sidebar content to bottom -->
  </div>