@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Edit Tanda Kehormatan</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('update.tanda-kehormatan', $tanker->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <!-- Pilih Personel -->
            <div class="form-group">
                <label for="personel_id">Personel</label>
                <select name="personel_id" class="form-control @error('personel_id') is-invalid @enderror">
                    <option value="">-- Pilih Personel --</option>
                    @foreach ($personels as $personel)
                        <option value="{{ $personel->id }}" {{ $personel->id == $tanker->personel_id ? 'selected' : '' }}>
                            {{ $personel->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
                @error('personel_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanda Kehormatan -->
            <div class="form-group">
                <label for="tanda_kehormatan">Tanda Kehormatan</label>
                <input type="text" name="tanda_kehormatan" class="form-control @error('tanda_kehormatan') is-invalid @enderror" value="{{ old('tanda_kehormatan', $tanker->tanda_kehormatan) }}">
                @error('tanda_kehormatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- TMT -->
            <div class="form-group">
                <label for="tmt">TMT</label>
                <input type="number" name="tmt" class="form-control @error('tmt') is-invalid @enderror" value="{{ old('tmt', $tanker->tmt) }}">
                @error('tmt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Gambar --}}
            <div class="form-group">
                <label for="gambar">Foto Surat</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg,.png,.jpeg,.gif" value="{{ old('gambar', $tanker->gambar) }}">
                @if ($tanker->gambar)
                    <img src="{{ asset('storage/tandaKehormatan/' . $tanker->gambar) }}" id="photo-preview" alt="Pratinjau Gambar" class="mt-2" width="200px">
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