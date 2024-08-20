@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Edit SubPangkat</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('update.subPangkat', ['id' => $subPangkat->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="pangkat_id" class="form-label">Pangkat</label>
                <select name="pangkat_id" id="pangkat_id" class="form-control select2" required>
                    <option value="" disabled selected>Select Pangkat</option>
                    @foreach($pangkat as $pangkat)
                        <option value="{{ $pangkat->id }}"{{ $pangkat->id == $subPangkat->pangkat_id ? 'selected' : '' }}>{{ $pangkat->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Nama SubPangkat</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $subPangkat->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>

@endsection