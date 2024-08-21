@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Informasi Personel</h6>
    </div>
    <div class="card-body">
        <div class="person d-flex align-items-center mb-3">
            <div class="person-image mr-3">
                <img src="{{ asset('assets1/image/kapolres.jpeg') }}" alt="Foto Personel" style="width: 298px; height: auto; border-radius: 8px;">
            </div>
            <div class="person-info">
                <h5>{{ $personel->nama_lengkap }}</h5>
                <p>Jabatan: {{ $personel->jabatan->nama }}</p>
                <p>Pangkat Polri: {{ $personel->pangkat->nama }}</p>
                <p>Pangkat PNS Polri: {{ $personel->pangkatPnsPolri->nama ?? 'N/A' }}</p>
                <p>Email: {{ $personel->email_pribadi }}</p>
                <p>Jenis Kelamin: {{ $personel->jenis_kelamin }}</p>
                <p>Status Perkawinan: {{ $personel->status_perkawinan }}</p>
                <p>Golongan Darah: {{ $personel->golongan_darah }}</p>
                <p>Agama: {{ $personel->agama }}</p>
                <p>Anak ke-: {{ $personel->anak_ke }}</p>
                <!-- Add more fields as needed -->
            </div>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
        <a href="{{ route('personil') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>

@endsection
