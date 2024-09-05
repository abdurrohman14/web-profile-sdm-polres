@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Informasi Personel</h6>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <!-- Kolom Foto -->
                <td class="align-top" style="width: 300px; padding-right: 20px;">
                    <img src="{{ asset('storage/personil/' . $personels->gambar) }}" alt="Foto Personel" style="width: 100%; max-width: 298px; height: auto; border-radius: 8px;">
                </td>
                <!-- Kolom Informasi -->
                <td class="align-top">
                    <h5>{{ $personels->nama_lengkap }}</h5>
                    <!-- Informasi dengan Flexbox untuk rata titik dua -->
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 150px;"><strong>Jabatan</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->jabatan->nama }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 150px;"><strong>Pangkat Polri</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->pangkat->nama }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 150px;"><strong>Pangkat PNS Polri</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->pangkatPnsPolri->nama ?? 'N/A' }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 150px;"><strong>Email</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->email_pribadi }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 150px;"><strong>Jenis Kelamin</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->jenis_kelamin }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 150px;"><strong>Status Pernikahan</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->status_pernikahan }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 150px;"><strong>Golongan Darah</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->golongan_darah }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 150px;"><strong>Agama</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->agama }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 150px;"><strong>Anak ke-</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->anak_ke }}</div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex justify-content-end">
        <a href="{{ route('index.person') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>

@endsection