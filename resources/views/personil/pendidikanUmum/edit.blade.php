@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Edit Pendidikan Umum</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('personil.penum.update', $pendidikan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Ubah method menjadi PUT untuk update -->

            <!-- Tingkat Pendidikan -->
            <div class="form-group">
                <label for="tingkat">Tingkat Pendidikan</label>
                <select name="jenjang_id" class="form-control @error('tingkat') is-invalid @enderror">
                    <option value="">-- Pilih Tingkat Pendidikan --</option>
                    @foreach ($tingkatPendidikanUmum as $tingkat)
                        <option value="{{ $tingkat->id }}" {{ $tingkat->id == $pendidikan->tingkat ? 'selected' : '' }}>{{ $tingkat->nama }}</option>
                    @endforeach
                </select>
                @error('tingkat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nama Institusi -->
            <div class="form-group">
                <label for="nama_institusi">Nama Institusi</label>
                <input type="text" name="nama_institusi" class="form-control @error('nama_institusi') is-invalid @enderror" value="{{ old('nama_institusi', $pendidikan->nama_nama_institusi) }}">
                @error('nama_institusi')
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
                    @if(!empty($pendidikan->gambar) && is_array(json_decode($pendidikan->gambar, true)))
                        @foreach(json_decode($pendidikan->gambar, true) as $image)
                            <img src="{{ asset('storage/pendidikanUmum/' . $image) }}" alt="{{ $image }}" style="width:100px; height:auto;">
                        @endforeach
                    @else
                        <img src="{{ asset('storage/pendidikanUmum/' . $pendidikan->gambar) }}" alt="{{ $pendidikan->gambar }}" style="width:100px; height:auto;">
                    @endif

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
                imgElement.style.maxWidth = '100px';
                imgElement.style.marginRight = '10px';
                imgElement.style.marginBottom = '10px';

                previewContainer.appendChild(imgElement);
            }
        }
    });
</script>
@endsection
