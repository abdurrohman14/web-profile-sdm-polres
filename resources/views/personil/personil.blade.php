@extends('partials.main')
@section('content')

<!-- Basic Card Example -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Informasi Data Diri</h6>
    </div>
    <div class="card-body">
        @if ($personel)
            <div class="d-flex">
                <!-- Kolom Foto -->
                <div class="person-image mr-4" style="width: 300px;">
                    <img src="{{ asset('storage/personil/' . $personel->gambar) }}" alt="Foto Personel" style="width: 100%; max-width: 298px; height: auto; border-radius: 8px;">
                </div>
                <!-- Kolom Informasi -->
                <div class="person-info">
                    <h5>{{ $personel->nama_lengkap }}</h5>
                    <!-- Informasi dengan Flexbox untuk rata titik dua -->
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 150px;"><strong>Jabatan</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personel->jabatan->nama }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 150px;"><strong>Pangkat Polri</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personel->pangkat->nama }}</div>
                    </div>
                    {{-- <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 150px;"><strong>Pangkat PNS Polri</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personel->pangkatPnsPolri->nama ?? 'N/A' }}</div>
                    </div> --}}
                </div>
            </div>
        @else
            <p>Data tidak ditemukan untuk pengguna ini.</p>
        @endif
    </div>
    <div class="card-footer d-flex justify-content-end">
        <a href="{{ route('personil.show', $personel->id) }}" class="btn btn-info">Detail</a>
    </div>
</div>



@endsection
