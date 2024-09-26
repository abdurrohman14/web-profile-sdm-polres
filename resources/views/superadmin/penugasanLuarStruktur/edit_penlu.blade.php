@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Edit Penugasan Luar Struktur</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('update.penlu', $penlu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <!-- Pilih Personel -->
            <div class="form-group">
                <label for="personel_id">Personel</label>
                <select name="personel_id" class="form-control @error('personel_id') is-invalid @enderror">
                    <option value="">-- Pilih Personel --</option>
                    @foreach ($personels as $personel)
                        <option value="{{ $personel->id }}" {{ $personel->id == $penlu->personel_id ? 'selected' : '' }}>
                            {{ $personel->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
                @error('personel_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Penugasan -->
            <div class="form-group">
                <label for="penugasan">Penugasan</label>
                <input type="text" name="penugasan" class="form-control @error('penugasan') is-invalid @enderror" value="{{ old('penugasan', $penlu->penugasan) }}">
                @error('penugasan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Lokasi -->
            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi', $penlu->lokasi) }}">
                @error('lokasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Gambar --}}
            <div class="form-group">
                <label for="gambar">Foto Surat</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg,.png,.jpeg,.gif" value="{{ old('gambar', $penlu->gambar) }}">
                @if ($penlu->gambar)
                    <img src="{{ asset('storage/penlu/' . $penlu->gambar) }}" id="photo-preview" alt="Pratinjau Gambar" class="mt-2" width="200px">
                @else
                    <p>Gambar belum tersedia</p>
                @endif
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