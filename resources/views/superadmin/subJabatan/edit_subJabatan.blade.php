@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Edit SubJabatan</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('update.subJabatan', ['id' => $subJabatan->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="jabatan_id" class="form-label">Jabatan</label>
                <select name="jabatan_id" id="jabatan_id" class="form-control select2" required>
                    <option value="" disabled selected>Select Jabatan</option>
                    @foreach($jabatan as $jabatan)
                        <option value="{{ $jabatan->id }}"{{ $jabatan->id == $subJabatan->jabatan_id ? 'selected' : '' }}>{{ $jabatan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Nama SubJabatan</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $subJabatan->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection