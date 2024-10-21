@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Tambah Pendidikan Umum</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('personil.penum.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="jenjang_id">Jenjang Pendidikan</label>
                <select name="jenjang_id" class="form-control @error('jenjang_id') is-invalid @enderror">
                    <option value="">-- Pilih Jenjang Pendidikan --</option>
                    @foreach ($tingkatPendidikanUmum as $tingkat)
                        <option value="{{ $tingkat->id }}">{{ $tingkat->nama }}</option>
                    @endforeach
                </select>
                @error('jenjang_id')
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

            <!-- Nama Institusi -->
            <div class="form-group">
                <label for="nama_institusi">Nama Institusi</label>
                <input type="text" name="nama_institusi" class="form-control @error('nama_institusi') is-invalid @enderror" value="{{ old('nama_institusi') }}">
                @error('nama_institusi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Gambar -->
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