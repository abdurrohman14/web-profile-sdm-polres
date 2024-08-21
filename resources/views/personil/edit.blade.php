@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Biodata</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('personil.update', $personel->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" value="{{ old('nama_lengkap', $personel->nama_lengkap) }}" required>
            </div>

            <div class="form-group">
                <label for="jabatan_id">Jabatan</label>
                <input type="text" name="jabatan_id" class="form-control" id="jabatan_id" value="{{ old('jabatan_id', $personel->jabatan_id) }}" required>
            </div>

            <div class="form-group">
                <label for="pangkat_id">Pangkat Polri</label>
                <input type="text" name="pangkat_id" class="form-control" id="pangkat_id" value="{{ old('pangkat_id', $personel->pangkat_id) }}" required>
            </div>

            <div class="form-group">
                <label for="pangkat_pns_polri_id">Pangkat PNS Polri</label>
                <input type="text" name="pangkat_pns_polri_id" class="form-control" id="pangkat_pns_polri_id" value="{{ old('pangkat_pns_polri_id', $personel->pangkat_pns_polri_id) }}">
            </div>

            <div class="form-group">
                <label for="email_pribadi">Email</label>
                <input type="email_pribadi" name="email_pribadi" class="form-control" id="email_pribadi" value="{{ old('email_pribadi', $personel->email_pribadi) }}" required>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" value="{{ old('jenis_kelamin', $personel->jenis_kelamin) }}" required>
            </div>

            <div class="form-group">
                <label for="status_pernikahan">Status Perkawinan</label>
                <input type="text" name="status_pernikahan" class="form-control" id="status_pernikahan" value="{{ old('status_pernikahan', $personel->status_pernikahan) }}" required>
            </div>

            <div class="form-group">
                <label for="golongan_darah">Golongan Darah</label>
                <input type="text" name="golongan_darah" class="form-control" id="golongan_darah" value="{{ old('golongan_darah', $personel->golongan_darah) }}" required>
            </div>

            <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" name="agama" class="form-control" id="agama" value="{{ old('agama', $personel->agama) }}" required>
            </div>

            <div class="form-group">
                <label for="anak_ke">Anak Ke-</label>
                <input type="number" name="anak_ke" class="form-control" id="anak_ke" value="{{ old('anak_ke', $personel->anak_ke) }}" required>
            </div>

            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>


@endsection