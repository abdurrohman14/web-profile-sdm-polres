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

$subJabatans = [
        'subbagbinops' => 'Subbagbinops',
        'subbagdalops' => 'Subbagdalops',
        'subbagkerma' => 'Subbagkerma',
        'subbagrenprogar' => 'Subbagrenprogar',
        'subbagdalprogar' => 'Subbagdalprogar',
        'subbagbinkar' => 'Subbagbinkar',
        'subbagdalpers' => 'Subbagdalpers',
        'subbagwatpers' => 'Subbagwatpers',
        'subbagbekpal' => 'Subbagbekpal',
        'subbagfaskon' => 'Subbagfaskon',
        'subsiopsnal' => 'Subsiopsnal',
        'subsibin' => 'Subsibin',
        'subsidumas' => 'Subsidumas',
        'unitpropam' => 'Unitpropam',
        'unitpaminal' => 'Unitpaminal',
        'subsipidm' => 'Subsipidm',
        'subsipenmas' => 'Subsipenmas',
        'subsibankum' => 'Subsibankum',
        'subsiluhkum' => 'Subsiluhkum',
        'subsitekkom' => 'Subsitekkom',
        'subsitekinfo' => 'Subsitekinfo',
        'subsimintu' => 'Subsimintu',
        'subsiyanma' => 'Subsiyanma',
        'subsigaji' => 'Subsigaji',
        'subsiverif' => 'Subsiverif',
        'subsiapk' => 'Subsiapk',
        'subsidokpol' => 'Subsidokpol',
        'subsikespol' => 'Subsikespol',
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
          <span>Dashboard</span>
      </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Interface
  </div>

  <!-- Nav Item - Data Master Collapse Menu -->
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
              <a class="collapse-item" href="{{ route('view.subJabatan') }}">Sub Jabatan</a>
              <a class="collapse-item" href="{{ route('view.subPangkat') }}">Sub Pangkat</a>
              <a class="collapse-item" href="{{ route('view.subPns') }}">Sub PNS</a>
          </div>
      </div>
  </li>

  <!-- Nav Item - Data Collapse Menu -->
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
              <a class="collapse-item" href="{{ route('index.team') }}">Our Team</a>
              <a class="collapse-item" href="{{ route('view.berita') }}">Berita</a>
          </div>
      </div>
  </li>

  <!-- Nav Item - Personel Collapse Menu -->
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
  
@elseif($user->role === \App\Models\User::ROLE_ADMIN)
  <!-- Divider -->
  <hr class="sidebar-divider">
  
  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
      <a class="nav-link" href="{{ route('admin') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
      </a>
  </li>

  <!-- Heading -->
  <div class="sidebar-heading">
      Addons
  </div>

  <!-- Nav Item - Subag Collapse Menu -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
         aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Subag</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Sub Jabatan</h6>
              @foreach ($subJabatans as $key => $label)
              <a class="collapse-item" href="{{ route('index.person', ['subJabatan' => $label]) }}">{{ $label }}</a>
          @endforeach
          </div>
      </div>
  </li>

@elseif($user->role === \App\Models\User::ROLE_PERSONIL)
  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
      <a class="nav-link" href="{{ route('personil') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
      </a>
  </li>

  <!-- Nav Item - Ubah Biodata -->
  <li class="nav-item">
      <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Ubah Biodata</span>
      </a>
  </li>
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