@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Tambah Pengembangan Pelatihan</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('personil.pengpel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <!-- Pengembangan Pelatihan -->
            <div class="form-group">
                <label for="dikbang">Dikbang</label>
                <input type="text" name="dikbang" class="form-control @error('dikbang') is-invalid @enderror" value="{{ old('dikbang') }}">
                @error('dikbang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <!-- Tahun -->
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun') }}">
                @error('tahun')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Gambar -->
            <div class="form-group">
                <label for="gambar">Foto Surat</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar[]" accept=".jpg,.png,.jpeg,.gif" multiple>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div id="photo-preview-container" style="display: flex; gap: 10px; margin-top: 4px; flex-wrap: wrap;"></div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('gambar').addEventListener('change', function(event) {
        // Ambil semua file yang dipilih oleh pengguna
        const files = event.target.files;
        const previewContainer = document.getElementById('photo-preview-container');
        previewContainer.innerHTML = ''; // Kosongkan kontainer pratinjau

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const imageURL = URL.createObjectURL(file);
            
            // Buat elemen img untuk setiap gambar
            const img = document.createElement('img');
            img.src = imageURL;
            img.style.maxWidth = '100px'; // Atur lebar maksimum untuk gambar
            img.style.marginTop = '4px'; // Atur margin atas untuk gambar
            previewContainer.appendChild(img); // Tambahkan gambar ke kontainer pratinjau
        }
    });
</script>

@endsection
