@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Tambah Personil</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('store.personel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jabatan_id" class="form-label">Jabatan</label>
                        <select name="jabatan_id" id="jabatan_id" class="form-control select2" required>
                            <option value="" disabled selected>Select Jabatan</option>
                            @foreach($jabatan as $jabatan)
                                <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pangkat_id" class="form-label">Pangkat</label>
                        <select name="pangkat_id" id="pangkat_id" class="form-control select2" required>
                            <option value="" disabled selected>Select Pangkat</option>
                            @foreach($pangkat as $pangkat)
                                <option value="{{ $pangkat->id }}">{{ $pangkat->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pangkat_pns_polri_id" class="form-label">Pangkat PNS</label>
                        <select name="pangkat_pns_polri_id" id="pangkat_pns_polri_id" class="form-control select2" required>
                            <option value="" disabled selected>Select Pangkat</option>
                            @foreach($pangkatPnsPolri as $pPns)
                                <option value="{{ $pPns->id }}">{{ $pPns->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="role_id" class="form-label">Role</label>
                        <select name="role_id" id="role_id" class="form-control select2" required>
                            <option value="" disabled selected>Select Role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept=".jpg,.png,.jpeg,.gif" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="" required>
                        @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_panggilan">Nama Panggilan</label>
                        <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" placeholder="" required>
                        @error('nama_panggilan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input type="number" class="form-control" id="nrp" name="nrp" placeholder="" required>
                        @error('nrp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="" required>
                        @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="" required>
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email_pribadi">Email Pribadi</label>
                        <input type="text" class="form-control" id="email_pribadi" name="email_pribadi" placeholder="" required>
                        @error('email_pribadi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email_dinas">Email Dinas</label>
                        <input type="text" class="form-control" id="email_dinas" name="email_dinas" placeholder="" required>
                        @error('email_dinas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status" placeholder="" required>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tmt_status">TMT Status</label>
                        <input type="text" class="form-control" id="tmt_status" name="tmt_status" placeholder="" required>
                        @error('tmt_status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="golongan_darah">Golongan Darah</label>
                        <input type="text" class="form-control" id="golongan_darah" name="golongan_darah" placeholder="" required>
                        @error('golongan_darah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="" required>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status_pernikahan">Status Pernikahan</label>
                        <input type="text" class="form-control" id="status_pernikahan" name="status_pernikahan" placeholder="" required>
                        @error('status_pernikahan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="anak_ke">Anak Ke</label>
                        <input type="text" class="form-control" id="anak_ke" name="anak_ke" placeholder="" required>
                        @error('anak_ke')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama" placeholder="" required>
                        @error('agama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="alamat_personel">Alamat Personel</label>
                        <input type="text" class="form-control" id="alamat_personel" name="alamat_personel" placeholder="" required>
                        @error('alamat_personel')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lkhpn">LKHPN</label>
                        <input type="text" class="form-control" id="lkhpn" name="lkhpn" placeholder="" required>
                        @error('lkhpn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_rambut">Jenis Rambut</label>
                        <input type="text" class="form-control" id="jenis_rambut" name="jenis_rambut" placeholder="" required>
                        @error('jenis_rambut')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="warna_mata">Warna Mata</label>
                        <input type="text" class="form-control" id="warna_mata" name="warna_mata" placeholder="" required>
                        @error('warna_mata')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="warna_kulit">Warna Kulit</label>
                        <input type="text" class="form-control" id="warna_kulit" name="warna_kulit" placeholder="" required>
                        @error('warna_kulit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="warna_rambut">Warna Rambut</label>
                        <input type="text" class="form-control" id="warna_rambut" name="warna_rambut" placeholder="" required>
                        @error('warna_rambut')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="" required>
                        @error('nama_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telepon_ortu">Telepon Ortu</label>
                        <input type="number" class="form-control" id="telepon_ortu" name="telepon_ortu" placeholder="" required>
                        @error('telepon_ortu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="alamat_ortu">Alamat Ortu</label>
                        <input type="text" class="form-control" id="alamat_ortu" name="alamat_ortu" placeholder="" required>
                        @error('alamat_ortu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tinggi">Tinggi</label>
                        <input type="number" class="form-control" id="tinggi" name="tinggi" placeholder="" required>
                        @error('tinggi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="berat">Berat</label>
                        <input type="number" class="form-control" id="berat" name="berat" placeholder="" required>
                        @error('berat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ukuran_topi">Ukuran Topi</label>
                        <input type="number" class="form-control" id="ukuran_topi" name="ukuran_topi" placeholder="" required>
                        @error('ukuran_topi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ukuran_celana">Ukuran Celana</label>
                        <input type="number" class="form-control" id="ukuran_celana" name="ukuran_celana" placeholder="" required>
                        @error('ukuran_celana')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ukuran_sepatu">Ukuran Sepatu</label>
                        <input type="number" class="form-control" id="ukuran_sepatu" name="ukuran_sepatu" placeholder="" required>
                        @error('ukuran_sepatu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ukuran_baju">Ukuran Baju</label>
                        <input type="number" class="form-control" id="ukuran_baju" name="ukuran_baju" placeholder="" required>
                        @error('ukuran_baju')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sidik_jari_1">Sidik Jari 1</label>
                        <input type="text" class="form-control" id="sidik_jari_1" name="sidik_jari_1" placeholder="" required>
                        @error('sidik_jari_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sidik_jari_2">Sidik Jari 2</label>
                        <input type="text" class="form-control" id="sidik_jari_2" name="sidik_jari_2" placeholder="" required>
                        @error('sidik_jari_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomor_keputusan_penyidik">Nomor Keputusan Penyidik</label>
                        <input type="text" class="form-control" id="nomor_keputusan_penyidik" name="nomor_keputusan_penyidik" placeholder="" required>
                        @error('nomor_keputusan_penyidik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kta">KTA</label>
                        <input type="text" class="form-control" id="kta" name="kta" placeholder="" required>
                        @error('kta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="asabri">Asabri</label>
                        <input type="text" class="form-control" id="asabri" name="asabri" placeholder="" required>
                        @error('asabri')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" placeholder="" required>
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="number" class="form-control" id="npwp" name="npwp" placeholder="" required>
                        @error('npwp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bpjs">BPJS</label>
                        <input type="number" class="form-control" id="bpjs" name="bpjs" placeholder="" required>
                        @error('bpjs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomor_kk">Nomor KK</label>
                        <input type="number" class="form-control" id="nomor_kk" name="nomor_kk" placeholder="" required>
                        @error('nomor_kk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="paspor">Paspor</label>
                        <input type="number" class="form-control" id="paspor" name="paspor" placeholder="" required>
                        @error('paspor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="akte_lahir">Akte Lahir</label>
                        <input type="number" class="form-control" id="akte_lahir" name="akte_lahir" placeholder="" required>
                        @error('akte_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tmt_masa_dinas">TMT Masa Dinas</label>
                        <input type="date" class="form-control" id="tmt_masa_dinas" name="tmt_masa_dinas" placeholder="" required>
                        @error('tmt_masa_dinas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
</div>

@endsection