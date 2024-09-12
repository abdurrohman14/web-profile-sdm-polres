@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Tambah Hero</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('store.hero') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Judul Hero</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Hero" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi Hero</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg,.png,.jpeg,.gif" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>

@endsection