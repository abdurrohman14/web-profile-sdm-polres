@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Tambah Jabatan</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('store.jabatan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Jabatan</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Jabatan" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
</div>

@endsection