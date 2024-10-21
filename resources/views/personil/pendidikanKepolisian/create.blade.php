@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Tambah Pendidikan Kepolisian</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('personil.penpol.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="tingkat">Tingkat Pendidikan</label>
                <select name="tingkat" class="form-control @error('tingkat') is-invalid @enderror">
                    <option value="">-- Pilih Tingkat Pendidikan --</option>
                    @foreach ($tingkatPendidikanKepolisian as $tingkat)
                        <option value="{{ $tingkat }}">{{ $tingkat }}</option>
                    @endforeach
                </select>
                @error('tingkat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <!-- Tahun Pendidikan -->
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun') }}">
                @error('tahun')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- Gambar --}}
            <div class="form-group">
                <label for="gambar">Foto Surat</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar[]" accept=".jpg,.png,.jpeg,.gif" multiple>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <!-- Tempat pratinjau beberapa gambar -->
                <div id="photo-preview-container" style="margin-top: 4px;"></div>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('gambar').addEventListener('change', function(event) {
        // Ambil file yang dipilih oleh pengguna
        const files = event.target.files;
        const previewContainer = document.getElementById('photo-preview-container');
        previewContainer.innerHTML = ''; // Kosongkan container sebelum menampilkan gambar baru
        
        // Loop melalui file yang dipilih
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            // Pastikan hanya menampilkan file yang berupa gambar
            if (file.type.startsWith('image/')) {
                // Buat objek URL untuk pratinjau foto
                const imageURL = URL.createObjectURL(file);
                
                // Buat elemen img baru untuk setiap file
                const imgElement = document.createElement('img');
                imgElement.src = imageURL;
                imgElement.style.maxWidth = '200px';
                imgElement.style.marginRight = '10px'; // Jarak antar gambar
                imgElement.style.marginBottom = '10px';
                
                // Tambahkan gambar ke container pratinjau
                previewContainer.appendChild(imgElement);
            }
        }
    });
</script>
@endsection
