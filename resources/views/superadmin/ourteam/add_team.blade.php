@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Tambah Team</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('store.team') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jabatan_id" class="form-label">Jabatan</label>
                <select name="jabatan_id" id="jabatan_id" class="form-control select2" required>
                    <option value="" disabled selected>Select Jabatan</option>
                    @foreach($jabatan as $jabatan)
                        <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="pangkat_id" class="form-label">Pangkat</label>
                <select name="pangkat_id" id="pangkat_id" class="form-control select2" required>
                    <option value="" disabled selected>Select Pangkat</option>
                    @foreach($pangkat as $pangkat)
                        <option value="{{ $pangkat->id }}">{{ $pangkat->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nrp">NRP</label>
                <input type="number" class="form-control" id="nrp" name="nrp" placeholder="Masukkan NRP" required>
                @error('nrp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg,.png,.jpeg,.gif" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection