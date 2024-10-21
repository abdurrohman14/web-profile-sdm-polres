@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Detail Informasi Personel</h6>
    </div>
    <div class="card-body mt-2">
        @if($personels)
            <div class="row justify-content-md-center">
                <div class="col-lg-12"></div>
                <div class="align-top" style="width: 200px; padding-right: 20px;">
                    <img src="{{ asset('storage/personil/' . $personels->gambar) }}" alt="Foto Personel" style="width: 100%; max-width: 298px; height: auto; border-radius: 8px;">    
                </div>
                <div class="col-lg-12"></div>
            </div>
            
            <div class="row justify-content-between mt-5">
                <div class="col-lg-6">
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Nama Lengkap</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2" style="min-width: 220px">{{ $personels->nama_lengkap }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Jabatan</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->jabatan->nama }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Pangkat Polri</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->pangkat->nama ?? '-' }} / {{ $personels->subPangkat->nama ?? '-' }}</div>
                    </div>
                    {{-- <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Pangkat PNS Polri</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->pangkatPnsPolri->nama ?? 'N/A' }}</div>
                    </div> --}}
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Status</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->status }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Nama Panggilan</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->nama_panggilan }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>NRP</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->nrp }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Tempat Lahir</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->tempat_lahir }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Golongan Darah</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->golongan_darah }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Jenis Kelamin</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->jenis_kelamin }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Status Pernikahan</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->status_pernikahan }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Suku Bangsa</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->suku }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Anak ke-</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->anak_ke }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Agama</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->agama }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Alamat Personel</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->alamat_personel }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>LKHPN</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->lkhpn }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Tinggi</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->tinggi }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Ukuran Topi</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->ukuran_topi }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Ukuran Celana</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->ukuran_celana }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Sidik Jari 1</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->sidik_jari_1 }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Nomor Keputusan Penyidik</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->nomor_keputusan_penyidik }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>BPJS</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->bpjs }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>NPWP</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->npwp }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Nomor Kartu Keluarga</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->nomor_kk }}</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>TMT Masa Dinas Surut</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->tmt_masa_dinas }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>TMT Status</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->tmt_status }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Email Pribadi</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->email_pribadi }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Email Dinas</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->email_dinas }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Handphone</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->no_hp }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Tanggal Lahir</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->tanggal_lahir }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Jenis Rambut</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->jenis_rambut }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Warna Mata</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->warna_mata }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Warna Kulit</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->warna_kulit }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Warna Rambut</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->warna_rambut }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Nama Ibu</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->nama_ibu }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Telepon Orang Tua</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->telepon_ortu }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>alamat Orang Tua</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->alamat_ortu }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Berat</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->berat }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Ukuran Sepatu</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->ukuran_sepatu }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Ukuran Baju</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->ukuran_baju }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Sidik Jari 2</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->sidik_jari_2 }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>KTA</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->kta }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Asabri</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->asabri }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Nomor Induk Kependudukan</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->nik }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Paspor</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->paspor }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Akte Lahir</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->akte_lahir }}</div>
                    </div>
                    <div class="info-item d-flex mb-2">
                        <div class="label" style="min-width: 220px;"><strong>Tanggal Pensiun</strong></div>
                        <div class="colon">:</div>
                        <div class="value ml-2">{{ $personels->tanggal_pensiun }}</div>
                    </div>
                </div>
            </div>
        @else
        <div class="row justify-content-md-center">
            <p>Data tidak tersedia</p>
        </div>
        @endif
    </div>
    <div class="card-footer d-flex justify-content-end">
        <a href="{{ route('view.personel') }}" class="btn btn-danger">Kembali</a>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Pendidikan Umum</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        @if($personels->pendidikanUmum->isEmpty())
                            <p>Belum ada data pendidikan umum.</p>
                        @else
                        <table class="table border-0">
                            <thead>
                                <tr>
                                    <th>Jenjang</th>
                                    <th>Nama Institusi</th>
                                    <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($personels->pendidikanUmum as $penum)
                                <tr>
                                    <td>{{ $penum->jenjang->nama }}</td>
                                    <td>{{ $penum->nama_institusi }}</td>
                                    <td>{{ $penum->tahun }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
