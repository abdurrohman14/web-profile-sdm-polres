@php
 $user = auth()->user();

//  Per-Jabatan Personil
$jabatans = [
        'kapolresta' => 'Kapolresta',
        'wakapolresta' => 'Wakapolresta',
        'bagops' => 'Bagops',
        'bagren' => 'Bagren',
        'bagsdm' => 'Bagsdm',
        'baglog' => 'Baglog',
        'siwas' => 'Siwas',
        'sipromam' => 'Sipromam',
        'sihumas' => 'Sihumas',
        'sikum' => 'Sikum',
        'sitik' => 'Sitik',
        'sium' => 'Sium',
        'spkt' => 'Spkt',
        'satintelkum' => 'Satintelkum',
        'satreskim' => 'Satreskim',
        'satnarkoba' => 'Satnarkoba',
        'satbinmas' => 'Satbinmas',
        'satsamapta' => 'Satsamapta',
        'satlantas' => 'Satlantas',
        'satpamobvit' => 'Satpamobvit',
        'satpolairud' => 'Satpolairud',
        'sattahti' => 'Sattahti',
        'sikeu' => 'Sikeu',
        'sidokkes' => 'Sidokkes',
    ];
@endphp

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">SDM Polres</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

@if($user->role === \App\Models\User::ROLE_SUPERADMIN)
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="{{ route('superadmin') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
      aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Data Master</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Components:</h6>
          <a class="collapse-item" href="{{ route('view.jabatan') }}">Jabatan</a>
          <a class="collapse-item" href="{{ route('view.pangkat') }}">Pangkat Polri</a>
          <a class="collapse-item" href="{{ route('view.pns') }}">PNS Polri</a>
          <a class="collapse-item" href="{{ route('view.subJabatan') }}">SubJabatan</a>
          <a class="collapse-item" href="{{ route('view.subPangkat') }}">SubPangkat</a>
          <a class="collapse-item" href="{{ route('view.subPns') }}">SubPNS</a>
      </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
      aria-expanded="true" aria-controls="collapseThree">
      <i class="fas fa-fw fa-cog"></i>
      <span>Data</span>
  </a>
  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Components:</h6>
          <a class="collapse-item" href="{{ route('index.hero') }}">Hero</a>
          <a class="collapse-item" href="{{ route('index.partner') }}">Partner</a>
          <a class="collapse-item" href="{{ route('index.team') }}">OurTeam</a>
          <a class="collapse-item" href="{{ route('view.berita') }}">Berita</a>
      </div>
  </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
      aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Personel</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
      data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Utilities:</h6>
          @foreach($jabatans as $key => $label)
          <a class="collapse-item" href="{{ route('view.personel', ['jabatan' => $key]) }}">{{ $label }}</a>
          @endforeach
      </div>
  </div>
</li>

<!-- Divider -->
@elseif($user->role === \App\Models\User::ROLE_ADMIN)
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
      aria-expanded="true" aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Pages</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Login Screens:</h6>
          <a class="collapse-item" href="login.html">Login</a>
          <a class="collapse-item" href="register.html">Register</a>
          <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
          <div class="collapse-divider"></div>
          <h6 class="collapse-header">Other Pages:</h6>
          <a class="collapse-item" href="404.html">404 Page</a>
          <a class="collapse-item" href="blank.html">Blank Page</a>
      </div>
  </div>
</li>

<!-- Nav Item - Charts -->
@elseif($user->role === \App\Models\User::ROLE_PERSONIL)
<li class="nav-item active">
  <a class="nav-link" href="{{ route('personil') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="charts.html">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Ubah Biodata</span></a>
</li>

<!-- Nav Item - Tables -->
{{-- <li class="nav-item">
  <a class="nav-link" href="tables.html">
      <i class="fas fa-fw fa-table"></i>
      <span>Tables</span></a>
</li> --}}
@endif

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message -->
{{-- <div class="sidebar-card d-none d-lg-flex">
  <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
  <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
  <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
</div> --}}