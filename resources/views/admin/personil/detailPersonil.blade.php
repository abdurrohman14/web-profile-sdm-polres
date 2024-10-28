@extends('partials.main')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Detail Informasi Personel</h6>
        </div>
        <div class="card-body mt-2">
            @if ($personels)
                <div class="row justify-content-md-center">
                    <div class="col-lg-12"></div>
                    <div class="align-top" style="width: 200px; padding-right: 20px;">
                        <img src="{{ asset('storage/personil/' . $personels->gambar) }}" alt="Foto Personel"
                            style="width: 100%; max-width: 298px; height: auto; border-radius: 8px;">
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
                            <div class="value ml-2">{{ $personels->pangkat->nama ?? '-' }} / {{  $personels->subPangkat->nama ?? '-' }}</div>
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
                    </div>
                    <div class="col-lg-6">
                        <div class="info-item d-flex mb-2">
                            <div class="label" style="min-width: 220px;"><strong>Nomor Kartu Keluarga</strong></div>
                            <div class="colon">:</div>
                            <div class="value ml-2">{{ $personels->nomor_kk }}</div>
                        </div>
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
                    </div>
                </div>
            @else
                <div class="row justify-content-md-center">
                    <p>Data tidak tersedia</p>
                </div>
            @endif
        </div>
        <div class="card-footer d-flex justify-content-end">
            <a href="{{ session('previous_url') ?? route('index.person') }}" class="btn btn-danger">Kembali</a>
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
                            @if ($personels->pendidikanUmum->isEmpty())
                                <p>Belum ada data pendidikan umum.</p>
                            @else
                                    <table class="table border-0">
                                        <thead>
                                            <tr>
                                                <th>Jenjang</th>
                                                <th>Nama Institusi</th>
                                                <th>Tahun</th>
                                                <th>Ijazah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($personels->pendidikanUmum as $penum)
                                            <tr>
                                                <td>{{ $penum->jenjang->nama }}</td>
                                                <td>{{ $penum->nama_institusi }}</td>
                                                <td>{{ $penum->tahun }}</td>
                                                <td>
                                                    @if (!empty($penum->gambar) && is_array(json_decode($penum->gambar)))
                                                        @foreach (json_decode($penum->gambar) as $image)
                                                            <img src="{{ asset('storage/pendidikanUmum/' . $image) }}" alt="{{ $image }}"
                                                                 class="img-thumbnail" style="width:100px; height:auto; cursor:pointer;"
                                                                 onclick="showImage('{{ asset('storage/pendidikanUmum/' . $image) }}')">
                                                        @endforeach
                                                    @else
                                                        <img src="{{ asset('storage/pendidikanUmum/' . $penum->gambar) }}" alt="{{ $penum->gambar }}"
                                                             class="img-thumbnail" style="width:100px; height:auto; cursor:pointer;"
                                                             onclick="showImage('{{ asset('storage/pendidikanUmum/' . $penum->gambar) }}')">
                                                    @endif
                                                </td>
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

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Pendidikan Kepolisian</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            @if ($personels->pendidikanKepolisian->isEmpty())
                                <p>Belum ada data pendidikan kepolisian.</p>
                            @else
                                    <table class="table border-0">
                                        <thead>
                                            <tr>
                                                <th>Jenjang</th>
                                                <th>Tahun</th>
                                                <th>Ijazah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($personels->pendidikanKepolisian as $key => $penkop)
                                                <tr>
                                                    <td>{{ $penkop->tingkat }}</td>
                                                    <td>{{ $penkop->tahun }}</td>
                                                    <td>
                                                        @if (!empty($penkop->gambar) && is_array(json_decode($penkop->gambar)))
                                                            @foreach (json_decode($penkop->gambar) as $image)
                                                                <img src="{{ asset('storage/pendidikanKepolisian/' . $image) }}"
                                                                    alt="{{ $image }}" class="img-thumbnail"
                                                                    style="width:100px; height:auto; cursor:pointer;"
                                                                    onclick="showImage('{{ asset('storage/pendidikanKepolisian/' . $image) }}')">
                                                            @endforeach
                                                        @else
                                                            <img src="{{ asset('storage/pendidikanKepolisian/' . $penkop->gambar) }}"
                                                                alt="{{ $penkop->gambar }}" class="img-thumbnail"
                                                                style="width:100px; height:auto; cursor:pointer;"
                                                                onclick="showImage('{{ asset('storage/pendidikanKepolisian/' . $penkop->gambar) }}')">
                                                        @endif
                                                    </td>
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

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Riwayat Jabatan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            @if ($personels->riwayatJabatan->isEmpty())
                                <p>Belum ada data riwayat jabatan.</p>
                            @else
                                <table class="table border-0">
                                    <thead>
                                        <tr>
                                            <th>Jabatan</th>
                                            <th>TMT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($personels->riwayatJabatan as $key => $rijabs)
                                            <tr>
                                                <td>{{ $rijabs->jabatan }}</td>
                                                <td>{{ \Carbon\Carbon::parse($rijabs->tmt)->format('d-m-Y') }}</td>
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

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Riwayat Pangkat</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            @if ($personels->riwayatPangkat->isEmpty())
                                <p>Belum ada data riwayat pangkat.</p>
                            @else
                                <table class="table border-0">
                                    <thead>
                                        <tr>
                                            <th>Pangkat</th>
                                            <th>TMT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($personels->riwayatPangkat as $key => $riwpat)
                                            <tr>
                                                <td>{{ $riwpat->pangkat }}</td>
                                                <td>{{ \Carbon\Carbon::parse($riwpat->tmt)->format('d-m-Y') }}</td>
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

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Tanda Kehormatan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            @if ($personels->tandaKehormatan->isEmpty())
                                <p>Belum ada data tanda kehormatan.</p>
                            @else
                            <table class="table border-0">
                                <thead>
                                    <tr>
                                        <th>Tanda Kehormatan</th>
                                        <th>Tahun</th>
                                        <th>Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personels->tandaKehormatan as $key => $tankers)
                                    <tr>
                                        <td>{{ $tankers->tanda_kehormatan }}</td>
                                        <td>{{ $tankers->tahun }}</td>
                                        <td>
                                            @if (!empty($tankers->gambar) && is_array(json_decode($tankers->gambar)))
                                                @foreach (json_decode($tankers->gambar) as $image)
                                                    <img src="{{ asset('storage/tandaKehormatan/' . $image) }}" alt="{{ $image }}"
                                                         class="img-thumbnail" style="width:100px; height:auto; cursor:pointer;"
                                                         onclick="showImage('{{ asset('storage/tandaKehormatan/' . $image) }}')">
                                                @endforeach
                                            @else
                                                <img src="{{ asset('storage/tandaKehormatan/' . $tankers->gambar) }}" alt="{{ $tankers->gambar }}"
                                                     class="img-thumbnail" style="width:100px; height:auto; cursor:pointer;"
                                                     onclick="showImage('{{ asset('storage/tandaKehormatan/' . $tankers->gambar) }}')">
                                            @endif
                                        </td>
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

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Penugasan Luar Struktur</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            @if ($personels->penugasanLuarStruktur->isEmpty())
                                <p>Belum ada data penugasan luar struktur.</p>
                            @else
                            <table class="table border-0">
                                <thead>
                                    <tr>
                                        <th>Penugasan</th>
                                        <th>Lokasi</th>
                                        <th>Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personels->penugasanLuarStruktur as $key => $penlu)
                                    <tr>
                                        <td>{{ $penlu->penugasan }}</td>
                                        <td>{{ $penlu->lokasi }}</td>
                                        <td>
                                            @if (!empty($penlu->gambar) && is_array(json_decode($penlu->gambar)))
                                                @foreach (json_decode($penlu->gambar) as $image)
                                                    <img src="{{ asset('storage/penugasanLuarStruktur/' . $image) }}" alt="{{ $image }}"
                                                         class="img-thumbnail" style="width:100px; height:auto; cursor:pointer;"
                                                         onclick="showImage('{{ asset('storage/penugasanLuarStruktur/' . $image) }}')">
                                                @endforeach
                                            @else
                                                <img src="{{ asset('storage/penugasanLuarStruktur/' . $penlu->gambar) }}" alt="{{ $penlu->gambar }}"
                                                     class="img-thumbnail" style="width:100px; height:auto; cursor:pointer;"
                                                     onclick="showImage('{{ asset('storage/penugasanLuarStruktur/' . $penlu->gambar) }}')">
                                            @endif
                                        </td>
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

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Pengembangan Pelatihan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            @if ($personels->pengembanganPelatihan->isEmpty())
                                <p>Belum ada data pengembangan pelatihan.</p>
                            @else
                            <table class="table border-0">
                                <thead>
                                    <tr>
                                        <th>Dikbang</th>
                                        <th>Tahun</th>
                                        <th>Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personels->pengembanganPelatihan as $key => $penlats)
                                    <tr>
                                        <td>{{ $penlats->dikbang }}</td>
                                        <td>{{ $penlats->tahun }}</td>
                                        <td>
                                            @if (!empty($penlats->gambar) && is_array(json_decode($penlats->gambar)))
                                                @foreach (json_decode($penlats->gambar) as $image)
                                                    <img src="{{ asset('storage/pengembanganPelatihan/' . $image) }}" alt="{{ $image }}"
                                                         class="img-thumbnail" style="width:100px; height:auto; cursor:pointer;"
                                                         onclick="showImage('{{ asset('storage/pengembanganPelatihan/' . $image) }}')">
                                                @endforeach
                                            @else
                                                <img src="{{ asset('storage/pengembanganPelatihan/' . $penlats->gambar) }}" alt="{{ $penlats->gambar }}"
                                                     class="img-thumbnail" style="width:100px; height:auto; cursor:pointer;"
                                                     onclick="showImage('{{ asset('storage/pengembanganPelatihan/' . $penlats->gambar) }}')">
                                            @endif
                                        </td>
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

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary">Kemampuan Bahasa</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            @if ($personels->kemampuanBahasa->isEmpty())
                                <p>Belum ada data kemampuan bahasa.</p>
                            @else
                                <table class="table border-0">
                                    <thead>
                                        <tr>
                                            <th>Bahasa</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($personels->kemampuanBahasa as $key => $mambas)
                                            <tr>
                                                <td>{{ $mambas->bahasa }}</td>
                                                <td>{{ $mambas->status }}</td>
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

    <!-- Modal Bootstrap -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="modalImage" src="" alt="Popup Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function showImage(src) {
            document.getElementById('modalImage').src = src;
            var imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
            imageModal.show();
        }
    </script>
@endsection
