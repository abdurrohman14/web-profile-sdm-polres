@auth
@php
 $user = auth()->user();
//  $subJabatan = $user->subJabatan;

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
        'subbagbinops' => 'Subbag binops',
        'subbagdalops' => 'Subbag dalops',
        'subbagkerma' => 'Subbag kerma',
        'subbagrenprogar' => 'Subbag renprogar',
        'subbagdalprogar' => 'Subbag dalprogar',
        'subbagbinkar' => 'Subbag binkar',
        'subbagdalpers' => 'Subbag dalpers',
        'subbagwatpers' => 'Subbag watpers',
        'subbagbekpal' => 'Subbag bekpal',
        'subbagfaskon' => 'Subbag faskon',
        'subsiopsnal' => 'Subsiopsnal',
        'subsibin' => 'Subsibin',
        'subsidumas' => 'Subsidumas',
        'unitpropam' => 'Unit propam',
        'unitpaminal' => 'Unit paminal',
        'subsipidm' => 'Subsi pidm',
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
{{-- @dd($user->subJabatan->nama) --}}
@endauth

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
  <div class="sidebar-brand-icon">
      {{-- <i class="fas fa-laugh-wink"></i> --}}
      <img src="{{ asset('assets1/image/polri.png') }}" alt="" width="60px">
  </div>
  <div class="sidebar-brand-text mx-2 mt-4">SDM Polres</div>
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
          <i class="fas fa-solid fa-folder-open"></i>
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
          <i class="fas fa-solid fa-folder"></i>
          <span>Data</span>
      </a>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Components:</h6>
              <a class="collapse-item" href="{{ route('index.hero') }}">Hero</a>
              <a class="collapse-item" href="{{ route('index.partner') }}">Partner</a>
              <a class="collapse-item" href="{{ route('index.team') }}">OurTeam</a>
              <a class="collapse-item" href="{{ route('view.berita') }}">Berita</a>
              <a class="collapse-item" href="{{ route('view.event') }}">Events</a>
          </div>
      </div>
  </li>

  <!-- Nav Item - Personel Collapse Menu -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
         aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-solid fa-users"></i>
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
          <span>Subbag</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Sub Bagops</h6>
              {{-- @foreach ($subJabatans as $key => $label) --}}
                @if($user->jabatan && strtolower($user->jabatan->nama) === 'bagops')
                    <a class="collapse-item" href="{{ route('index.binops') }}">Subbag Binops</a>
                    <a class="collapse-item" href="{{ route('index.dalops') }}">Subbag Dalops</a>
                    <a class="collapse-item" href="{{ route('index.kerma') }}">Subbag Kerma</a>
                @endif

                {{-- @if($user->subJabatan && strtolower($user->subJabatan->nama) === 'subbag dalops')
                    <a class="collapse-item" href="{{ route('index.dalops') }}">Subbag Dalops</a>
                @endif --}}
              {{-- @endforeach --}}
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

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="{{ route('personil.edit', $personel->id) }}">
      <i class="fas fa-fw fa-table"></i>
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