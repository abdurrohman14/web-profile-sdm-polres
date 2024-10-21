@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Tambah Riwayat Jabatan</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('personil.rijab.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            
            <!-- Jabatan -->
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan') }}">
                @error('jabatan')
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
        // Hapus pratinjau sebelumnya
        const container = document.getElementById('photo-preview-container');
        container.innerHTML = ''; // Menghapus konten sebelumnya
        
        // Ambil file yang dipilih oleh pengguna
        const files = event.target.files;

        // Loop melalui setiap file untuk menampilkan pratinjau
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            
            // Cek apakah file adalah gambar
            if (file.type.match('image.*')) {
                const imageURL = URL.createObjectURL(file);

                // Buat elemen gambar baru untuk pratinjau
                const imgElement = document.createElement('img');
                imgElement.src = imageURL;
                imgElement.style.maxWidth = '150px';
                imgElement.style.maxHeight = '150px';
                imgElement.style.objectFit = 'cover';
                
                // Tampilkan gambar di container
                container.appendChild(imgElement);
            }
        }
    });
</script>

@endsection
