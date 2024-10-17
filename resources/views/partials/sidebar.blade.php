@auth
@php
 $user = auth()->user();
 $jabatan = $user->jabatan->nama ?? '';  // Ambil nama jabatan, jika ada
 $subJabatan = $user->subJabatan->nama ?? '';  // Ambil nama subJabatan, jika ada

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
{{-- @dd($user->subJabatan->nama) --}}
@endauth

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
  <div class="sidebar-brand-icon">
      {{-- <i class="fas fa-laugh-wink"></i> --}}
      <img src="{{ asset('assets1/image/polri.png') }}" alt="" width="60px">
  </div>
  <div class="sidebar-brand-text mx-2 mt-4 text-dark fw-bold">SDM Polres</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

@if($user->role === \App\Models\User::ROLE_SUPERADMIN)
  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
      <a class="nav-link" href="{{ route('superadmin') }}">
          <i class="fas fa-fw fa-tachometer-alt text-dark"></i>
          <span class="text-dark">Dashboard</span>
      </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading text-dark ">
      Interface
  </div>

  <!-- Nav Item - Data Master Collapse Menu -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
         aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-solid fa-folder-open text-dark"></i>
          <span class="text-dark">Master</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Components:</h6>
              <a class="collapse-item" href="{{ route('view.jabatan') }}">Jabatan</a>
              <a class="collapse-item" href="{{ route('view.pangkat') }}">Pangkat</a>
              {{-- <a class="collapse-item" href="{{ route('view.pns') }}">PNS Polri</a> --}}
              <a class="collapse-item" href="{{ route('view.subJabatan') }}">Sub Jabatan</a>
              <a class="collapse-item" href="{{ route('view.subPangkat') }}">Sub Pangkat</a>
              {{-- <a class="collapse-item" href="{{ route('view.subPns') }}">Sub PNS</a> --}}
          </div>
      </div>
  </li>

  <!-- Nav Item - Data Collapse Menu -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
         aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-solid fa-home text-dark"></i>
          <span class="text-dark">Home</span>
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

  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
         aria-expanded="true" aria-controls="collapseFour">
          <i class="fas fa-solid fa-school text-dark"></i>
          <span class="text-dark">Pendidikan</span>
      </a>
      <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Components:</h6>
              <a class="collapse-item" href="{{ route('view.pendidikan-kepolisian') }}">Pendidikan Kepolisian</a>
              <a class="collapse-item" href="{{ route('view.pendidikan-umum') }}">Pendidikan Umum</a>
              <a class="collapse-item" href="{{ route('view.riwayat-pangkat') }}">Riwayat Pangkat</a>
              <a class="collapse-item" href="{{ route('view.riwayat-jabatan') }}">Riwayat Jabatan</a>
              <a class="collapse-item" href="{{ route('view.pengembangan-pelatihan') }}">Pengembangan</a>
              <a class="collapse-item" href="{{ route('view.tanda-kehormatan') }}">Tanda Kehormatan</a>
              <a class="collapse-item" href="{{ route('view.kemampuan-bahasa') }}">Kemampuan Bahasa</a>
              <a class="collapse-item" href="{{ route('view.penlu') }}">Penugasan Luar Struktur</a>
          </div>
      </div>
  </li>

  <!-- Nav Item - Personel Collapse Menu -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
         aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-solid fa-users text-dark"></i>
          <span class="text-dark">Personel</span>
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
          <i class="fas fa-fw fa-tachometer-alt text-dark"></i>
          <span class="text-dark">Dashboard</span>
      </a>
  </li>

<!-- Heading -->
<div class="sidebar-heading text-dark">
  Addons
</div>

  <!-- Nav Item - Subag Collapse Menu -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
         aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-solid fa-user-nurse text-dark"></i>
          <span class="text-dark">{{ $user->jabatan ? ucfirst(strtolower($user->jabatan->nama)) : 'Subbag' }}</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            @if($user->jabatan)
                <h6 class="collapse-header">{{ $user->jabatan->nama }}</h6>

                @php
                    $jabatanLower = strtolower($user->jabatan->nama)
                @endphp

                @if($jabatanLower === 'bagops')
                    <a class="collapse-item" href="{{ route('index.binops', ['subJabatan' => 'SUBBAG BINOPS']) }}">Subbag Binops</a>
                    <a class="collapse-item" href="{{ route('index.dalops', ['subJabatan' => 'SUBBAG DALOPS']) }}">Subbag Dalops</a>
                    <a class="collapse-item" href="{{ route('index.kerma', ['subJabatan' => 'SUBBAG KERMA']) }}">Subbag Kerma</a>
                @elseif($jabatanLower === 'bagren')
                    <a class="collapse-item" href="{{ route('index.renprogar', ['subJabatan' => 'SUBBAG RENPROGAR']) }}">Subbag Renprogar</a>
                    <a class="collapse-item" href="{{ route('index.dalprogar',['subJabatan' => 'SUBBAG DALPROGAR']) }}">Subbag Dalprogar</a>
                @elseif($jabatanLower === 'bagsdm')
                    <a class="collapse-item" href="{{ route('index.binkar', ['subJabatan' => 'SUBBAG BINKAR']) }}">Subbag Binkar</a>
                    <a class="collapse-item" href="{{ route('index.dalpers', ['subJabatan' => 'SUBBAG DALPRES']) }}">Subbag Dalpers</a>
                    <a class="collapse-item" href="{{ route('index.watpers', ['subJabatan' => 'SUBBAG WATPERS']) }}">Subbag Watpers</a>
                @elseif($jabatanLower === 'baglog')
                    <a class="collapse-item" href="{{ route('index.bekpal', ['subJabatan' => 'SUBBAG BEKPAL']) }}">Subbag Bekpal</a>
                    <a class="collapse-item" href="{{ route('index.faskon', ['subJabatan' => 'SUBBAG FASKON']) }}">Subbag Faskon</a>
                @elseif($jabatanLower === 'siwas')
                    <a class="collapse-item" href="{{ route('index.subsiopsnal', ['subJabatan' => 'SUBSIOPSNAL']) }}">Subsiopsnal</a>
                    <a class="collapse-item" href="{{ route('index.subsibin', ['subJabatan' => 'SUBSIBIN']) }}">Subsibin</a>
                    <a class="collapse-item" href="{{ route('index.subsidumas', ['subJabatan' => 'SUBSIDUMAS']) }}">Subsidumas</a>
                @elseif($jabatanLower === 'sipromam')
                    <a class="collapse-item" href="{{ route('index.propam', ['subJabatan' => 'UNIT PROPAM']) }}">Unit Propam</a>
                    <a class="collapse-item" href="{{ route('index.paminal', ['subJabatan' => 'UNIT PAMINAL']) }}">Unit Paminal</a>
                @elseif($jabatanLower === 'sihumas')
                    <a class="collapse-item" href="{{ route('index.pidm', ['subJabatan' => 'SUBSIPIDM']) }}">Subsipidm</a>
                    <a class="collapse-item" href="{{ route('index.penmas', ['subJabatan' => 'SUBSIPENMAS']) }}">Subsipenmas</a>
                @elseif($jabatanLower === 'sikum')
                    <a class="collapse-item" href="{{ route('index.bankum', ['subJabatan' => 'SUBSIBANKUM']) }}">Subsibankum</a>
                    <a class="collapse-item" href="{{ route('index.luhkum', ['subJabatan' => 'SUBSILUHKUM']) }}">Subsiluhkum</a>
                @elseif($jabatanLower === 'sitik')
                    <a class="collapse-item" href="{{ route('index.tekkom', ['subJabatan' => 'SUBSITEKKOM']) }}">Subsitekkom</a>
                    <a class="collapse-item" href="{{ route('index.tekinfo', ['subJabatan' => 'SUBSITEKINFO']) }}">Subsitekinfo</a>
                @elseif($jabatanLower === 'sium')
                    <a class="collapse-item" href="{{ route('index.mintu', ['subJabatan' => 'SUBSIMINTU']) }}">Subsimintu</a>
                    <a class="collapse-item" href="{{ route('index.yanma', ['subJabatan' => 'SUBSIYANMA']) }}">Subsiyanma</a>
                @elseif($jabatanLower === 'spkt')
                    <a class="collapse-item" href="{{ route('index.spkt') }}">SPKT</a>
                @elseif($jabatanLower === 'satintelkum')
                    <a class="collapse-item" href="{{ route('index.intelkum') }}">Sat Intelkum</a>
                @elseif($jabatanLower === 'satreskim')
                    <a class="collapse-item" href="{{ route('index.reskim') }}">Sat Reskim</a>
                @elseif($jabatanLower === 'satnarkoba')
                    <a class="collapse-item" href="{{ route('index.narkoba') }}">Sat Narkoba</a>
                @elseif($jabatanLower === 'satbinmas')
                    <a class="collapse-item" href="{{ route('index.binmas') }}">Sat Binmas</a>
                @elseif($jabatanLower === 'satsamapta')
                    <a class="collapse-item" href="{{ route('index.samapta') }}">Sat Samapta</a>
                @elseif($jabatanLower === 'satlantas')
                    <a class="collapse-item" href="{{ route('index.lantas') }}">Sat Lantas</a>
                @elseif($jabatanLower === 'satpamobvit')
                    <a class="collapse-item" href="{{ route('index.pamobvit') }}">Sat Pamobvit</a>
                @elseif($jabatanLower === 'satpolairud')
                    <a class="collapse-item" href="{{ route('index.polairud') }}">Sat Polairud</a>
                @elseif($jabatanLower === 'sattahti')
                    <a class="collapse-item" href="{{ route('index.tahti') }}">Sat Tahti</a>
                @elseif ($jabatanLower === 'sikeu')
                    <a class="collapse-item" href="{{ route('index.gaji', ['subJabatan' => 'SUBSIGAJI']) }}">Subsigaji</a>
                    <a class="collapse-item" href="{{ route('index.verif', ['subJabatan' => 'SUBSIVERIF']) }}">Subsiverif</a>
                    <a class="collapse-item" href="{{ route('index.apk', ['subJabatan' => 'SUBSIAPK']) }}">Subsiapk</a>
                @elseif ($jabatanLower === 'sidokkes')
                    <a class="collapse-item" href="{{ route('index.dokpol', ['subJabatan' => 'SUBSIDOKPOL']) }}">Subsidokpol</a>
                    <a class="collapse-item" href="{{ route('index.sikespol', ['subJabatan' => 'SUBSIKESPOL']) }}">Subsikespol</a>
                @else
                    <a class="collapse-item" href="{{ route('index.jabatan', $user->jabatan->id) }}">{{ $user->jabatan->nama }}</a>
                @endif
            @endif
          </div>
      </div>
  </li>

@elseif($user->role === \App\Models\User::ROLE_PERSONIL)
  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
      <a class="nav-link" href="{{ route('personil') }}">
          <i class="fas fa-fw fa-tachometer-alt text-dark"></i>
          <span class="text-dark">Dashboard</span>
      </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
       aria-expanded="true" aria-controls="collapseFour">
        <i class="fas fa-solid fa-school text-dark"></i>
        <span class="text-dark">Pendidikan</span>
    </a>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="{{ route('personil.penpol.index') }}">Pendidikan Kepolisian</a>
            <a class="collapse-item" href="{{ route('personil.penum.index') }}">Pendidikan Umum</a>
            <a class="collapse-item" href="{{ route('personil.ripang.index') }}">Riwayat Pangkat</a>
            <a class="collapse-item" href="{{ route('personil.rijab.index') }}">Riwayat Jabatan</a>
            <a class="collapse-item" href="{{ route('personil.pengpel.index') }}">Pengembangan</a>
            <a class="collapse-item" href="{{ route('personil.tankeh.index') }}">Tanda Kehormatan</a>
            <a class="collapse-item" href="{{ route('personil.kembhs.index') }}">Kemampuan Bahasa</a>
            <a class="collapse-item" href="{{ route('personil.pls.index') }}">Penugasan Luar Struktur</a>
        </div>
    </div>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    @if($personel)
  <a class="nav-link" href="{{ route('personil.edit', $personel->id) }}">
      <i class="fas fa-fw fa-table text-dark"></i>
      <span class="text-dark">Ubah Biodata</span>
  </a>
  @endif
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