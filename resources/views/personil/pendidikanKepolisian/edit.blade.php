@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Edit Pendidikan Kepolisian</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('personil.penpol.update', $pendidikan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Ubah method menjadi PUT untuk update -->

            <!-- Tingkat Pendidikan -->
            <div class="form-group">
                <label for="tingkat">Tingkat Pendidikan</label>
                <select name="tingkat" class="form-control @error('tingkat') is-invalid @enderror">
                    <option value="">-- Pilih Tingkat Pendidikan --</option>
                    @foreach ($tingkatPendidikanKepolisian as $tingkat)
                        <option value="{{ $tingkat }}" {{ $tingkat == $pendidikan->tingkat ? 'selected' : '' }}>{{ $tingkat }}</option>
                    @endforeach
                </select>
                @error('tingkat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tahun Pendidikan -->
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun', $pendidikan->tahun) }}">
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
                <!-- Tempat pratinjau beberapa gambar -->
                <div id="photo-preview-container" style="margin-top: 4px;">
                    @foreach(explode(',', $pendidikan->gambar) as $image)
                        <img src="{{ asset('storage/pendidikanKepolisian/' . trim($image)) }}" alt="{{ $image }}" style="width:100px; height:auto;">
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('gambar').addEventListener('change', function(event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('photo-preview-container');
        previewContainer.innerHTML = '';

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (file.type.startsWith('image/')) {
                const imageURL = URL.createObjectURL(file);
                const imgElement = document.createElement('img');
                imgElement.src = imageURL;
                imgElement.style.maxWidth = '200px';
                imgElement.style.marginRight = '10px';
                imgElement.style.marginBottom = '10px';

                previewContainer.appendChild(imgElement);
            }
        }
    });
</script>
@endsection
