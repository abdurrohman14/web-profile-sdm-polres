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
                            <option value="" disabled selected>Pilih Jabatan</option>
                            @foreach($jabatan as $jabatan)
                                <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sub_jabatan_id" class="form-label">SubJabatan</label>
                        <select name="sub_jabatan_id" id="sub_jabatan_id" class="form-control select2" >
                            <option value="" disabled selected>Pilih SubJabatan</option>
                            @foreach($subJabatan as $subJbt)
                                <option value="{{ $subJbt->id }}">{{ $subJbt->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pangkat_id" class="form-label">Pangkat</label>
                        <select name="pangkat_id" id="pangkat_id" class="form-control select2" required>
                            <option value="" disabled selected>Pilih Pangkat</option>
                            @foreach($pangkat as $pangkat)
                                <option value="{{ $pangkat->id }}">{{ $pangkat->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sub_pangkat_id" class="form-label">SubPangkat</label>
                        <select name="sub_pangkat_id" id="sub_pangkat_id" class="form-control select2" >
                            <option value="" disabled selected>Pilih SubPangkat</option>
                            @foreach($subPangkat as $sbP)
                                <option value="{{ $sbP->id }}">{{ $sbP->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pangkat_pns_polri_id" class="form-label">Pangkat PNS</label>
                        <select name="pangkat_pns_polri_id" id="pangkat_pns_polri_id" class="form-control select2" required>
                            <option value="" disabled selected>Pilih Gol Ruang</option>
                            @foreach($pangkatPnsPolri as $pPns)
                                <option value="{{ $pPns->id }}">{{ $pPns->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sub_pns_polri_id" class="form-label">SubPNS</label>
                        <select name="sub_pns_polri_id" id="sub_pns_polri_id" class="form-control select2" >
                            <option value="" disabled selected>Pilih SubPNS</option>
                            @foreach($subPnsPolri as $sbPP)
                                <option value="{{ $sbPP->id }}">{{ $sbPP->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="role_id" class="form-label">Role</label>
                        <select name="role_id" id="role_id" class="form-control select2" required>
                            <option value="" disabled selected>Pilih Role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gambar">Foto</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg,.png,.jpeg,.gif" required>
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
                        <input type="text" class="form-control" id="email_dinas" name="email_dinas" placeholder="" >
                        @error('email_dinas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="" required>
                        @error('no_hp')
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
                        <input type="date" class="form-control" id="tmt_status" name="tmt_status" placeholder="" required>
                        @error('tmt_status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="golongan_darah">Golongan Darah:</label>
                        <select name="golongan_darah" id="golongan_darah" class="form-control" required>
                            <option value="">Pilih Golongan Darah</option>
                            <option value="A" {{ old('golongan_darah') == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ old('golongan_darah') == 'B' ? 'selected' : '' }}>B</option>
                            <option value="AB" {{ old('golongan_darah') == 'AB' ? 'selected' : '' }}>AB</option>
                            <option value="O" {{ old('golongan_darah') == 'O' ? 'selected' : '' }}>O</option>
                        </select>
                        @error('golongan_darah')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin:</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status_pernikahan">Status Pernikahan:</label>
                        <select name="status_pernikahan" id="status_pernikahan" class="form-control" required>
                            <option value="">Pilih Status Pernikahan</option>
                            <option value="Belum Menikah" {{ old('status_pernikahan') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                            <option value="Menikah" {{ old('status_pernikahan') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                            <option value="Duda" {{ old('status_pernikahan') == 'Duda' ? 'selected' : '' }}>Duda</option>
                            <option value="Janda" {{ old('status_pernikahan') == 'Janda' ? 'selected' : '' }}>Janda</option>
                        </select>
                        @error('status_pernikahan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="anak_ke">Anak Ke</label>
                        <input type="number" class="form-control" id="anak_ke" name="anak_ke" placeholder="" required>
                        @error('anak_ke')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="agama">Agama:</label>
                        <select name="agama" id="agama" class="form-control" required>
                            <option value="">Pilih Agama</option>
                            <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        </select>
                        @error('agama')
                            <span class="text-danger">{{ $message }}</span>
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
                        <input type="text" class="form-control" id="lkhpn" name="lkhpn" placeholder="" >
                        @error('lkhpn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_rambut">Jenis Rambut</label>
                        <input type="text" class="form-control" id="jenis_rambut" name="jenis_rambut" placeholder="" >
                        @error('jenis_rambut')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="warna_mata">Warna Mata</label>
                        <input type="text" class="form-control" id="warna_mata" name="warna_mata" placeholder="" >
                        @error('warna_mata')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="warna_kulit">Warna Kulit</label>
                        <input type="text" class="form-control" id="warna_kulit" name="warna_kulit" placeholder="" >
                        @error('warna_kulit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="warna_rambut">Warna Rambut</label>
                        <input type="text" class="form-control" id="warna_rambut" name="warna_rambut" placeholder="" >
                        @error('warna_rambut')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="" >
                        @error('nama_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telepon_ortu">Telepon Ortu</label>
                        <input type="number" class="form-control" id="telepon_ortu" name="telepon_ortu" placeholder="" >
                        @error('telepon_ortu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="alamat_ortu">Alamat Ortu</label>
                        <input type="text" class="form-control" id="alamat_ortu" name="alamat_ortu" placeholder="" >
                        @error('alamat_ortu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tinggi">Tinggi</label>
                        <input type="number" class="form-control" id="tinggi" name="tinggi" placeholder="" >
                        @error('tinggi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="berat">Berat</label>
                        <input type="number" class="form-control" id="berat" name="berat" placeholder="" >
                        @error('berat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ukuran_topi">Ukuran Topi</label>
                        <input type="number" class="form-control" id="ukuran_topi" name="ukuran_topi" placeholder="" >
                        @error('ukuran_topi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ukuran_celana">Ukuran Celana</label>
                        <input type="number" class="form-control" id="ukuran_celana" name="ukuran_celana" placeholder="" >
                        @error('ukuran_celana')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ukuran_sepatu">Ukuran Sepatu</label>
                        <input type="number" class="form-control" id="ukuran_sepatu" name="ukuran_sepatu" placeholder="" >
                        @error('ukuran_sepatu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ukuran_baju">Ukuran Baju</label>
                        <input type="number" class="form-control" id="ukuran_baju" name="ukuran_baju" placeholder="" >
                        @error('ukuran_baju')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sidik_jari_1">Sidik Jari 1</label>
                        <input type="text" class="form-control" id="sidik_jari_1" name="sidik_jari_1" placeholder="" >
                        @error('sidik_jari_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sidik_jari_2">Sidik Jari 2</label>
                        <input type="text" class="form-control" id="sidik_jari_2" name="sidik_jari_2" placeholder="" >
                        @error('sidik_jari_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomor_keputusan_penyidik">Nomor Keputusan Penyidik</label>
                        <input type="text" class="form-control" id="nomor_keputusan_penyidik" name="nomor_keputusan_penyidik" placeholder="" >
                        @error('nomor_keputusan_penyidik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kta">KTA</label>
                        <input type="text" class="form-control" id="kta" name="kta" placeholder="" >
                        @error('kta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="asabri">Asabri</label>
                        <input type="text" class="form-control" id="asabri" name="asabri" placeholder="" >
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
                        <input type="number" class="form-control" id="npwp" name="npwp" placeholder="" >
                        @error('npwp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bpjs">BPJS</label>
                        <input type="number" class="form-control" id="bpjs" name="bpjs" placeholder="" >
                        @error('bpjs')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomor_kk">Nomor KK</label>
                        <input type="number" class="form-control" id="nomor_kk" name="nomor_kk" placeholder="" >
                        @error('nomor_kk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="paspor">Paspor</label>
                        <input type="number" class="form-control" id="paspor" name="paspor" placeholder="" >
                        @error('paspor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="akte_lahir">Akte Lahir</label>
                        <input type="number" class="form-control" id="akte_lahir" name="akte_lahir" placeholder="" >
                        @error('akte_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tmt_masa_dinas">TMT Masa Dinas</label>
                        <input type="date" class="form-control" id="tmt_masa_dinas" name="tmt_masa_dinas" placeholder="" >
                        @error('tmt_masa_dinas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h4 class="m-0 font-weight-bold text-primary">Data SIM</h4>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahDataSimModal">
            Tambah Data SIM
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Nomor</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>    
</div>

<!-- Modal Tambah Data SIM -->
<div class="modal fade" id="tambahDataSimModal" tabindex="-1" aria-labelledby="tambahDataSimLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataSimLabel">Tambah Data SIM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createSimForm" method="POST" action="{{ route('store.sim') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="jenis">Jenis SIM</label>
                        <input type="text" class="form-control" id="jenis" name="jenis">
                    </div>
                    <div class="form-group">
                        <label for="nomor">Nomor</label>
                        <input type="text" class="form-control" id="nomor" name="nomor">
                    </div>
                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Data SIM -->
<div class="modal fade" id="editDataSimModal" tabindex="-1" aria-labelledby="editDataSimLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataSimLabel">Edit Data SIM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editSimForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="editJenis">Jenis SIM</label>
                        <input type="text" class="form-control" id="editJenis" name="jenis">
                    </div>
                    <div class="form-group">
                        <label for="editNomor">Nomor</label>
                        <input type="text" class="form-control" id="editNomor" name="nomor">
                    </div>
                    <div class="form-group">
                        <label for="editFile">File</label>
                        <input type="file" class="form-control" id="editFile" name="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // list data
    $(document).ready(function() {
    var table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('data.sim') }}',
        columns: [
            { data: null, name: 'id', render: function(data, type, row, meta) {
                return meta.row + 1;
            }},
            { data: 'jenis', name: 'jenis' },
            { data: 'nomor', name: 'nomor' },
            { data: 'file', name: 'file', render: function(data, type, row) {
                return `<a href="{{ url('storage/') }}/${data}" target="_blank"><i class="fas fa-solid fa-eye"></i></a>`;
            }},
            { data: 'id', name: 'aksi', render: function(data, type, row) {
                return `
                    <div class="d-flex align-items-center">
                        <button onclick="editSim(${data})" class="btn btn-sm btn-primary mr-1"><i class="fas fa-solid fa-pen"></i></button>
                        <form id="deleteForm${data}" action="#" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deleteSim(${data})" class="btn btn-sm btn-danger"><i class="fas fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                `;
            }}
        ]
    });

    // tambah data
    $('#createSimForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: '{{ route('store.sim') }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#tambahDataSimModal').modal('hide');
                table.ajax.reload();
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.success
                });
            },
            error: function(response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan. Silakan coba lagi.'
                });
            }
        });
    });

    // edit data
    $('#editSimForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var simId = $(this).data('id');

        $.ajax({
            url: `/personel/sim/update/${simId}`,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#editDataSimModal').modal('hide');
                table.ajax.reload();
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.success
                });
            },
            error: function(response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan. Silakan coba lagi.'
                });
            }
        });
    });
});

// edit data
function editSim(id) {
    $.get(`/personel/sim/edit/${id}`, function(data) {
        $('#editJenis').val(data.sim.jenis);
        $('#editNomor').val(data.sim.nomor);
        $('#editSimForm').data('id', data.sim.id);
        $('#editDataSimModal').modal('show');
    });
}

// hapus data
function deleteSim(id) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data SIM ini akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `{{ url('personel/sim/delete') }}/${id}`,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    $('#dataTable').DataTable().ajax.reload();
                    Swal.fire(
                        'Dihapus!',
                        response.success,
                        'success'
                    );
                },
                error: function(response) {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan. Silakan coba lagi.',
                        'error'
                    );
                }
            });
        }
    });
}
</script>

@endsection