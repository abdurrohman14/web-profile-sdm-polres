@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Tambah Pendidikan Kepolisian</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('store.pendidikan-kepolisian') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="personel_id">Personel</label>
                <select name="personel_id" class="form-control @error('personel_id') is-invalid @enderror">
                    <option value="">-- Pilih Personel --</option>
                    @foreach ($personels as $personel)
                        <option value="{{ $personel->id }}">{{ $personel->nama_lengkap }}</option>
                    @endforeach
                </select>
                @error('personel_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <!-- Tingkat Pendidikan -->
            <div class="form-group">
                <label for="tingkat">Tingkat Pendidikan</label>
                <input type="text" name="tingkat" class="form-control @error('tingkat') is-invalid @enderror" value="{{ old('tingkat') }}">
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
                <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg,.png,.jpeg,.gif" required>
                <img id="photo-preview" src="#" alt="Pratinjau" style="max-width: 200px; display: none; margin-top: 4px;">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<script>
	document.getElementById('gambar').addEventListener('change', function(event) {
	// Ambil file yang dipilih oleh pengguna
	const file = event.target.files[0];
	// Buat objek URL untuk pratinjau foto
	const imageURL = URL.createObjectURL(file);
	// Perbarui src dari elemen img untuk menampilkan pratinjau foto
	document.getElementById('photo-preview').src = imageURL;
	// Tampilkan elemen img pratinjau foto
	document.getElementById('photo-preview').style.display = 'block';
});
</script>
@endsection