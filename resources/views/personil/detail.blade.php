@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Detail Informasi Personel</h6>
    </div>
    <div class="container">
        @if ($personel)
                <tr>
                    <div class="row justify-content-md-center">
                        <div class="col col-lg-2">
                        </div>
                        <div class="align-top" style="width: 300px; padding-right: 20px;">
                            <img src="{{ asset('storage/personil/' . $personel->gambar) }}" alt="Foto Personel" style="width: 100%; max-width: 298px; height: auto; border-radius: 8px;">    
                        </div>
                        <div class="col col-lg-2">
                        </div>
                    </div>

                    <div class="row justify-content-between mt-5">
                        <div class="col-4">
                            <!-- Informasi dengan Flexbox untuk rata titik dua -->
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Nama Lengkap</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2" style="min-width: 220px">{{ $personel->nama_lengkap }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Jabatan</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->jabatan->nama }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Pangkat Polri</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->pangkat->nama }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Pangkat PNS Polri</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->pangkatPnsPolri->nama ?? 'N/A' }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Status</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->status }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Nama Panggilan</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->nama_panggilan }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Tempat Lahir</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->tempat_lahir }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Golongan Darah</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->golongan_darah }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Jenis Kelamin</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->jenis_kelamin }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Status Pernikahan</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->status_pernikahan }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Suku Bangsa</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->suku_bangsa }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Anak ke-</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->anak_ke }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Agama</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->agama }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Alamat Personel</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2 ">{{ $personel->alamat_personel }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>LKHPN</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->lkhpn }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Tinggi</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->tinggi }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Ukuran Topi</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->ukuran_topi }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Ukuran Celana</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->ukuran_celana }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Sidik Jari 1</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->sidik_jari_1 }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Nomor Keputusan Penyidik</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->nomor_keputusan_penyidik }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>BPJS</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->bpjs }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>NPWP</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->npwp }}</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Nomor Kartu Keluarga</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->nomor_kartu_keluarga }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>TMT Masa Dinas Surut</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->tmt_masa_dinas_surut }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>TMT Status</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->tmt_status }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Email Pribadi</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->email_pribadi }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Email Dinas</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->email_dinas }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Handphone</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->handphone }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Tanggal Lahir</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->tanggal_lahir }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Jenis Rambut</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->jenis_rambut }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Warna Mata</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->warna_mata }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Warna Kulit</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->warna_kulit }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Warna Rambut</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->warna_rambut }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Nama Ibu</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->nama_ibu }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Telepon Orang Tua</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->telepon_orangtua }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>alamat Orang Tua</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->alamat_orangtua }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Berat</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->berat }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Ukuran Sepatu</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->ukuran_sepatu }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Ukuran Baju</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->ukuran_baju }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Sidik Jari 2</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->sidik_jari_2 }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>KTA</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->kta }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Asabri</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->asabri }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Nomor Induk Kependudukan</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->nik }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Paspor</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->paspor }}</div>
                            </div>
                            <div class="info-item d-flex mb-2">
                                <div class="label" style="min-width: 220px;"><strong>Akte Lahir</strong></div>
                                <div class="colon">:</div>
                                <div class="value ml-2">{{ $personel->akte_lahir }}</div>
                            </div>
                        </div>
                      </div>
                </tr>
        @else
            <p>Data tidak ditemukan untuk pengguna ini.</p>
        @endif
    </div>
    <div class="card-footer d-flex justify-content-end">
        <a href="{{ route('personil') }}" class="btn btn-danger">Kembali</a>
        <a href="{{ route('personil.export', $personel->id) }}" class="btn btn-primary ml-2" target="_blank">Cetak PDF</a>
    </div>
</div>

@endsection
