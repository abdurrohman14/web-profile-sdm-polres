@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Ubah Riwayat Pangkat</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('personil.ripang.update', $riwayat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Pangkat -->
            <div class="form-group">
                <label for="pangkat">Pangkat</label>
                <select name="pangkat" class="form-control @error('pangkat') is-invalid @enderror">
                    @foreach ($riwayatPangkat as $pangkat)
                        <option value="{{ $pangkat->nama }}" {{ $pangkat->nama == $riwayat->pangkat ? 'selected' : '' }}>
                            {{ $pangkat->nama }}
                        </option>
                    @endforeach
                </select>
                @error('pangkat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <!-- Tahun -->
            <div class="form-group">
                <label for="tmt">Tahun</label>
                <input type="date" name="tmt" class="form-control @error('tmt') is-invalid @enderror" value="{{ old('tmt', $riwayat->tmt) }}">
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
                <div id="photo-preview-container" style="display: flex; gap: 10px; margin-top: 4px; flex-wrap: wrap;">
                    <!-- Existing images preview -->
                    @if(!empty($riwayat->gambar) && is_array(json_decode($riwayat->gambar, true)))
                        @foreach(json_decode($riwayat->gambar, true) as $image)
                            <img src="{{ asset('storage/riwayatPangkat/' . $image) }}" alt="{{ $image }}" style="width:100px; height:auto;">
                        @endforeach
                    @else
                        <img src="{{ asset('storage/riwayatPangkat/' . $riwayat->gambar) }}" alt="{{ $riwayat->gambar }}" style="width:100px; height:auto;">
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
        previewContainer.innerHTML = ''; // Empty the preview container
        
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const imageURL = URL.createObjectURL(file);
            
            // Create an img element for preview
            const img = document.createElement('img');
            img.src = imageURL;
            img.style.maxWidth = '100px';
            img.style.marginRight = '10px';
            img.alt = 'Pratinjau';
            
            // Add img to container
            previewContainer.appendChild(img);
        }
    });
</script>

@endsection
