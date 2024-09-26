@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Edit Kemampuan Bahasa</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('update.kemampuan-bahasa', $mamba->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <!-- Pilih Personel -->
            <div class="form-group">
                <label for="personel_id">Personel</label>
                <select name="personel_id" class="form-control @error('personel_id') is-invalid @enderror">
                    <option value="">-- Pilih Personel --</option>
                    @foreach ($personels as $personel)
                        <option value="{{ $personel->id }}" {{ $personel->id == $mamba->personel_id ? 'selected' : '' }}>
                            {{ $personel->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
                @error('personel_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Bahasa -->
            <div class="form-group">
                <label for="bahasa">Bahasa</label>
                <input type="text" name="bahasa" class="form-control @error('bahasa') is-invalid @enderror" value="{{ old('bahasa', $mamba->bahasa) }}">
                @error('bahasa')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Status -->
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status', $mamba->status) }}">
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection