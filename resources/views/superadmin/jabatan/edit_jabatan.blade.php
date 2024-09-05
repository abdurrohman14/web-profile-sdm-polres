@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Edit Jabatan</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('update.jabatan', ['id' => $jabatan->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="nama">Nama Jabatan</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $jabatan->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection