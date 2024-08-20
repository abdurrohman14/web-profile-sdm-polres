@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Edit Team</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('update.team', ['id' => $ourteams->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $ourteams->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jabatan_id" class="form-label">Jabatan</label>
                <select name="jabatan_id" id="jabatan_id" class="form-control select2" required>
                    <option value="" disabled selected>Select Jabatan</option>
                    @foreach($jabatan as $jab)
                        <option value="{{ $jab->id }}"{{ $jab->id == $ourteams->jabatan_id ? 'selected' : '' }}>{{ $jab->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="pangkat_id" class="form-label">Pangkat</label>
                <select name="pangkat_id" id="pangkat_id" class="form-control select2" required>
                    <option value="" disabled selected>Select Pangkat</option>
                    @foreach($pangkat as $p)
                        <option value="{{ $p->id }}"{{ $p->id == $ourteams->pangkat_id ? 'selected' : '' }}>{{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nrp" class="form-label">NRP</label>
                <input type="text" class="form-control" id="nrp" name="nrp" value="{{ old('nama', $ourteams->nrp) }}">
                @error('nrp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg,.png,.jpeg,.gif">
                @if($ourteams->gambar)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $ourteams->gambar) }}" alt="{{ $ourteams->title }}" width="100">
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>

@endsection