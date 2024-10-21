@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Edit Jenjang</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('update.jenjang', ['id' => $jenjangPendikum->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Jenjang Pendidikan</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $jenjangPendikum->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection