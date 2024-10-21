@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Tambah Riwayat Pangkat</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('personil.ripang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')

            <!-- Pangkat -->
            <div class="form-group">
                <label for="pangkat">Pangkat</label>
                <input type="text" name="pangkat" class="form-control @error('pangkat') is-invalid @enderror" value="{{ old('pangkat') }}">
                @error('pangkat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <!-- Tahun -->
            <div class="form-group">
                <label for="tmt">Tahun</label>
                <input type="date" name="tmt" class="form-control @error('tmt') is-invalid @enderror" value="{{ old('tmt') }}">
                @error('tmt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Gambar -->
            <div class="form-group">
                <label for="gambar">Foto Surat</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar[]" accept=".jpg,.png,.jpeg,.gif" multiple>
                @error('gambar.*')
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
        const files = event.target.files;
        const previewContainer = document.getElementById('photo-preview-container');
        previewContainer.innerHTML = ''; // Kosongkan pratinjau sebelumnya
        
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const imageURL = URL.createObjectURL(file);
            
            // Buat elemen img untuk pratinjau
            const img = document.createElement('img');
            img.src = imageURL;
            img.style.maxWidth = '100px'; // Atur lebar maksimum
            img.style.marginRight = '10px';
            img.alt = 'Pratinjau';
            
            // Tambahkan img ke container
            previewContainer.appendChild(img);
        }
    });
</script>

@endsection
