@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Informasi Personel</h6>
    </div>
    <div class="card-body">
        <div class="person d-flex align-items-center mb-3">
            <div class="person-image mr-3">
                <img src="{{ asset('storage/personil/' . $personels->gambar) }}" alt="Foto Personel" style="width: 298px; height: auto; border-radius: 8px;">
            </div>
            <div class="person-info">
                <h5>{{ $personels->nama_lengkap }}</h5>
                <p>Jabatan: {{ $personels->jabatan->nama }}</p>
                <p>Unit: {{ $personels->role->nama ?? ' - '}}</p>
                <p>Pangkat Polri: {{ $personels->pangkat->nama }}</p>
                <p>Pangkat PNS Polri: {{ $personels->pangkatPnsPolri->nama ?? 'N/A' }}</p>
                <p>Email: {{ $personels->email_pribadi }}</p>
                <p>Jenis Kelamin: {{ $personels->jenis_kelamin }}</p>
                <p>Status Perkawinan: {{ $personels->status_pernikahan }}</p>
                <p>Golongan Darah: {{ $personels->golongan_darah }}</p>
                <p>Agama: {{ $personels->agama }}</p>
                <p>Anak ke-: {{ $personels->anak_ke }}</p>
                <!-- Add more fields as needed -->
            </div>
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
        <a href="{{ route('view.personel') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>

@endsection