@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Informasi Personel</h6>
    </div>
    <div class="card-body">
        @if ($personel)
            <table class="table">
                <tr>
                    <!-- Kolom Foto -->
                    <td class="align-top" style="width: 300px; padding-right: 20px;">
                        <img src="{{ asset('storage/personil/' . $personel->gambar) }}" alt="Foto Personel" style="width: 100%; max-width: 298px; height: auto; border-radius: 8px;">
                    </td>
                    <!-- Kolom Informasi -->
                    <td class="align-top">
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
                        <div class="info-item d-flex mb-2">
                            <div class="label" style="min-width: 150px;"><strong>Pangkat PNS Polri</strong></div>
                            <div class="colon">:</div>
                            <div class="value ml-2">{{ $personel->pangkatPnsPolri->nama ?? 'N/A' }}</div>
                        </div>
                        <div class="info-item d-flex mb-2">
                            <div class="label" style="min-width: 150px;"><strong>Email</strong></div>
                            <div class="colon">:</div>
                            <div class="value ml-2">{{ $personel->email_pribadi }}</div>
                        </div>
                        <div class="info-item d-flex mb-2">
                            <div class="label" style="min-width: 150px;"><strong>Jenis Kelamin</strong></div>
                            <div class="colon">:</div>
                            <div class="value ml-2">{{ $personel->jenis_kelamin }}</div>
                        </div>
                        <div class="info-item d-flex mb-2">
                            <div class="label" style="min-width: 150px;"><strong>Status Pernikahan</strong></div>
                            <div class="colon">:</div>
                            <div class="value ml-2">{{ $personel->status_pernikahan }}</div>
                        </div>
                        <div class="info-item d-flex mb-2">
                            <div class="label" style="min-width: 150px;"><strong>Golongan Darah</strong></div>
                            <div class="colon">:</div>
                            <div class="value ml-2">{{ $personel->golongan_darah }}</div>
                        </div>
                        <div class="info-item d-flex mb-2">
                            <div class="label" style="min-width: 150px;"><strong>Agama</strong></div>
                            <div class="colon">:</div>
                            <div class="value ml-2">{{ $personel->agama }}</div>
                        </div>
                        <div class="info-item d-flex mb-2">
                            <div class="label" style="min-width: 150px;"><strong>Anak ke-</strong></div>
                            <div class="colon">:</div>
                            <div class="value ml-2">{{ $personel->anak_ke }}</div>
                        </div>
                    </td>
                </tr>
            </table>
        @else
            <p>Data tidak ditemukan untuk pengguna ini.</p>
        @endif
    </div>
    <div class="card-footer d-flex justify-content-end">
        <a href="{{ route('personil') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>



@endsection
