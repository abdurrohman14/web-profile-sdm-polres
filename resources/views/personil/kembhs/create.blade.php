@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Tambah Kemampuan Bahasa</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('personil.kembhs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <!-- Kemampuan Bahasa -->
            <div class="form-group">
                <label for="bahasa">Kemampuan Bahasa</label>
                <input type="text" name="bahasa" class="form-control @error('bahasa') is-invalid @enderror" value="{{ old('bahasa') }}">
                @error('bahasa')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <!-- Tahun -->
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}">
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection