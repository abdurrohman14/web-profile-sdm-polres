@extends('partials.main')
@section('content')

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informasi Data Diri</h6>
    </div>
    <div class="card-body">
        @if ($personel)
            <div class="person d-flex align-items-center mb-3">
                <div class="person-image mr-3">
                    <img src="{{ asset('assets1/image/kapolres.jpeg') }}" alt="Foto Personel" style="width: 298px; height: auto; border-radius: 8px;">
                </div>
                <div class="person-info">
                    <h5>{{ $personel->nama_lengkap }}</h5>
                    <p>Jabatan: {{ $personel->jabatan->nama }}</p>
                    <p>Pangkat Polri: {{ $personel->pangkat->nama }}</p>
                    <p>Pangkat PNS Polri: {{ $personel->pangkatPnsPolri->nama ?? 'N/A' }}</p>
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
