@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-dark">Edit Personil</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('update.person', ['id' => $personels->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
        <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jabatan_id">Jabatan</label>
                        <select id="jabatan_id" name="jabatan_id" class="form-control">
                            @foreach($jabatan as $jab)
                                <option value="{{ $jab->id }}" {{ $personels->jabatan_id == $jab->id ? 'selected' : '' }}>
                                    {{ $jab->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sub_jabatan_id">Sub Jabatan</label>
                        <select id="sub_jabatan_id" name="sub_jabatan_id" class="form-control">
                            <option value="">-- Pilih Sub Jabatan --</option>
                            @foreach($subJabatan as $subJab)
                                <option value="{{ $subJab->id }}" {{ $personels->sub_jabatan_id == $subJab->id ? 'selected' : '' }}>
                                    {{ $subJab->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pangkat_id">Pangkat</label>
                        <select id="pangkat_id" name="pangkat_id" class="form-control">
                            @foreach($pangkat as $pang)
                                <option value="{{ $pang->id }}" {{ $personels->pangkat_id == $pang->id ? 'selected' : '' }}>
                                    {{ $pang->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sub_pangkat_id">Sub Pangkat</label>
                        <select id="sub_pangkat_id" name="sub_pangkat_id" class="form-control">
                            <option value="">-- Pilih Sub Pangkat --</option>
                            @foreach($subPangkat as $subPang)
                                <option value="{{ $subPang->id }}" {{ $personels->sub_pangkat_id == $subPang->id ? 'selected' : '' }}>
                                    {{ $subPang->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pangkat_pns_polri_id">Gol Ruang</label>
                        <select id="pangkat_pns_polri_id" name="pangkat_pns_polri_id" class="form-control">
                            <option value="">-- Pilih Pangkat PNS Polri --</option>
                            @foreach($pangkatPnsPolri as $pangkatPns)
                                <option value="{{ $pangkatPns->id }}" {{ $personels->pangkat_pns_polri_id == $pangkatPns->id ? 'selected' : '' }}>
                                    {{ $pangkatPns->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sub_pns_polri_id">Sub PNS Polri</label>
                        <select id="sub_pns_polri_id" name="sub_pns_polri_id" class="form-control">
                            <option value="">-- Pilih Sub PNS Polri --</option>
                            @foreach($subPnsPolri as $subPns)
                                <option value="{{ $subPns->id }}" {{ $personels->sub_pns_polri_id == $subPns->id ? 'selected' : '' }}>
                                    {{ $subPns->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="role_id">Role</label>
                        <select id="role_id" name="role_id" class="form-control">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $personels->role_id == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        @if($personels->gambar)
                            <div>
                                <img src="{{ asset('storage/personil/' . $personels->gambar) }}" alt="Gambar Personil" width="100">
                            </div>
                        @endif
                        <input type="file" id="gambar" name="gambar" class="form-control">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $personels->nama_lengkap) }}">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_panggilan">Nama Panggilan</label>
                        <input type="text" id="nama_panggilan" name="nama_panggilan" class="form-control" value="{{ old('nama_panggilan', $personels->nama_panggilan) }}">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input type="number" id="nrp" name="nrp" class="form-control" value="{{ old('nrp', $personels->nrp) }}">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $personels->tempat_lahir) }}">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $personels->tanggal_lahir) }}">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email_pribadi">Email Pribadi</label>
                        <input type="text" id="email_pribadi" name="email_pribadi" class="form-control" value="{{ old('email_pribadi', $personels->email_pribadi) }}">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email_dinas">Email Dinas</label>
                        <input type="text" id="email_dinas" name="email_dinas" class="form-control" value="{{ old('email_dinas', $personels->email_dinas) }}">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="number" id="no_hp" name="no_hp" class="form-control" value="{{ old('no_hp', $personels->no_hp) }}">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" id="status" name="status" class="form-control" value="{{ old('status', $personels->status) }}">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tmt_status">TMT Status</label>
                        <input type="date" id="tmt_status" name="tmt_status" class="form-control" value="{{ old('tmt_status', $personels->tmt_status) }}">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="golongan_darah">Golongan Darah</label>
                        <select id="golongan_darah" name="golongan_darah" class="form-control">
                            <option value="">-- Pilih Golongan Darah --</option>
                            <option value="A" {{ $personels->golongan_darah == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ $personels->golongan_darah == 'B' ? 'selected' : '' }}>B</option>
                            <option value="AB" {{ $personels->golongan_darah == 'AB' ? 'selected' : '' }}>AB</option>
                            <option value="O" {{ $personels->golongan_darah == 'O' ? 'selected' : '' }}>O</option>
                        </select>
                    </div>
                </div>
            
    
            <!-- Jenis Kelamin -->
            <div class="col-md-6">
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki" {{ $personels->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $personels->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            </div>
    
            <!-- Status Pernikahan -->
            <div class="col-md-6">
            <div class="form-group">
                <label for="status_pernikahan">Status Pernikahan</label>
                <select id="status_pernikahan" name="status_pernikahan" class="form-control">
                    <option value="">-- Pilih Status Pernikahan --</option>
                    <option value="Belum Menikah" {{ $personels->status_pernikahan == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                    <option value="Menikah" {{ $personels->status_pernikahan == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                    <option value="Duda" {{ $personels->status_pernikahan == 'Duda' ? 'selected' : '' }}>Duda</option>
                    <option value="Janda" {{ $personels->status_pernikahan == 'Janda' ? 'selected' : '' }}>Janda</option>
                </select>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="agama">Agama</label>
                <select id="agama" name="agama" class="form-control">
                    <option value="">-- Pilih Status Pernikahan --</option>
                    <option value="Islam" {{ $personels->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ $personels->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ $personels->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ $personels->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ $personels->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Konghucu" {{ $personels->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                </select>
            </div>
            </div>
            
            <div class="col-md-6">
            <div class="form-group">
                <label for="anak_ke">Anak Ke</label>
                <input type="number" id="anak_ke" name="anak_ke" class="form-control" value="{{ old('anak_ke', $personels->anak_ke) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="alamat_personel">Alamat Personel</label>
                <input type="text" id="alamat_personel" name="alamat_personel" class="form-control" value="{{ old('alamat_personel', $personels->alamat_personel) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="lkhpn">LKHPN</label>
                <input type="text" id="lkhpn" name="lkhpn" class="form-control" value="{{ old('lkhpn', $personels->lkhpn) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="jenis_rambut">Jenis Rambut</label>
                <input type="text" id="jenis_rambut" name="jenis_rambut" class="form-control" value="{{ old('jenis_rambut', $personels->jenis_rambut) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="warna_mata">Warna Mata</label>
                <input type="text" id="warna_mata" name="warna_mata" class="form-control" value="{{ old('warna_mata', $personels->warna_mata) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="warna_kulit">Warna Kulit</label>
                <input type="text" id="warna_kulit" name="warna_kulit" class="form-control" value="{{ old('warna_kulit', $personels->warna_kulit) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="warna_rambut">Warna Rambut</label>
                <input type="text" id="warna_rambut" name="warna_rambut" class="form-control" value="{{ old('warna_rambut', $personels->warna_rambut) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="nama_ibu">Nama Ibu</label>
                <input type="text" id="nama_ibu" name="nama_ibu" class="form-control" value="{{ old('nama_ibu', $personels->nama_ibu) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="telepon_ortu">Telepon Ortu</label>
                <input type="number" id="telepon_ortu" name="telepon_ortu" class="form-control" value="{{ old('telepon_ortu', $personels->telepon_ortu) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="tinggi">Tinggi</label>
                <input type="number" id="tinggi" name="tinggi" class="form-control" value="{{ old('tinggi', $personels->tinggi) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="berat">Berat</label>
                <input type="number" id="berat" name="berat" class="form-control" value="{{ old('berat', $personels->berat) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="ukuran_topi">Ukuran Topi</label>
                <input type="number" id="ukuran_topi" name="ukuran_topi" class="form-control" value="{{ old('ukuran_topi', $personels->ukuran_topi) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="anak_ke">Anak Ke</label>
                <input type="number" id="anak_ke" name="anak_ke" class="form-control" value="{{ old('anak_ke', $personels->anak_ke) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="ukuran_celana">Ukuran Celana</label>
                <input type="number" id="ukuran_celana" name="ukuran_celana" class="form-control" value="{{ old('ukuran_celana', $personels->ukuran_celana) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="ukuran_sepatu">Ukuran Sepatu</label>
                <input type="number" id="ukuran_sepatu" name="ukuran_sepatu" class="form-control" value="{{ old('ukuran_sepatu', $personels->ukuran_sepatu) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="ukuran_baju">Ukuran Baju</label>
                <input type="number" id="ukuran_baju" name="ukuran_baju" class="form-control" value="{{ old('ukuran_baju', $personels->ukuran_baju) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="sidik_jari_1">Sidik Jari 1</label>
                <input type="text" id="sidik_jari_1" name="sidik_jari_1" class="form-control" value="{{ old('sidik_jari_1', $personels->sidik_jari_1) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="sidik_jari_2">Sidik Jari 2</label>
                <input type="text" id="sidik_jari_2" name="sidik_jari_2" class="form-control" value="{{ old('sidik_jari_2', $personels->sidik_jari_2) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="nomor_keputusan_penyidik">Nomor Keputusan Penyidik</label>
                <input type="text" id="nomor_keputusan_penyidik" name="nomor_keputusan_penyidik" class="form-control" value="{{ old('nomor_keputusan_penyidik', $personels->nomor_keputusan_penyidik) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="kta">KTA</label>
                <input type="text" id="kta" name="kta" class="form-control" value="{{ old('kta', $personels->kta) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="asabri">Asabri</label>
                <input type="text" id="asabri" name="asabri" class="form-control" value="{{ old('asabri', $personels->asabri) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="number" id="nik" name="nik" class="form-control" value="{{ old('nik', $personels->nik) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="bpjs">BPJS</label>
                <input type="number" id="bpjs" name="bpjs" class="form-control" value="{{ old('bpjs', $personels->bpjs) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="npwp">NPWP</label>
                <input type="number" id="npwp" name="npwp" class="form-control" value="{{ old('npwp', $personels->npwp) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="nomor_kk">Nomor KK</label>
                <input type="number" id="nomor_kk" name="nomor_kk" class="form-control" value="{{ old('nomor_kk', $personels->nomor_kk) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="paspor">Paspor</label>
                <input type="number" id="paspor" name="paspor" class="form-control" value="{{ old('paspor', $personels->paspor) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="akte_lahir">Akte Lahir</label>
                <input type="number" id="akte_lahir" name="akte_lahir" class="form-control" value="{{ old('akte_lahir', $personels->akte_lahir) }}">
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label for="tmt_masa_dinas">TMT Masa Dinas</label>
                <input type="date" id="tmt_masa_dinas" name="tmt_masa_dinas" class="form-control" value="{{ old('tmt_masa_dinas', $personels->tmt_masa_dinas) }}">
            </div>
            </div>
        </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection