@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Edit Riwayat Jabatan</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('personil.rijab.update', $riwayatJabatan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Jabatan -->
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan', $riwayatJabatan->jabatan) }}">
                @error('jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
    
            <!-- Tahun -->
            <div class="form-group">
                <label for="tmt">Tahun</label>
                <input type="date" name="tmt" class="form-control @error('tmt') is-invalid @enderror" value="{{ old('tmt', $riwayatJabatan->tmt) }}">
                @error('tmt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Gambar -->
            <div class="form-group">
                <label for="gambar">Foto Surat (Opsional)</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar[]" accept=".jpg,.png,.jpeg,.gif" multiple>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div id="photo-preview-container" style="display: flex; gap: 10px; margin-top: 4px; flex-wrap: wrap;">
                    @if(!empty($riwayatJabatan->gambar) && is_array(json_decode($riwayatJabatan->gambar, true)))
                        @foreach(json_decode($riwayatJabatan->gambar, true) as $image)
                            <img src="{{ asset('storage/riwayatJabatan/' . $image) }}" alt="{{ $image }}" style="width:100px; height:auto;">
                        @endforeach
                    @else
                        <img src="{{ asset('storage/riwayatJabatan/' . $riwayatJabatan->gambar) }}" alt="{{ $riwayatJabatan->gambar }}" style="width:100px; height:auto;">
                    @endif
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('gambar').addEventListener('change', function(event) {
        const container = document.getElementById('photo-preview-container');
        container.innerHTML = ''; 
        
        const files = event.target.files;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            
            if (file.type.match('image.*')) {
                const imageURL = URL.createObjectURL(file);

                const imgElement = document.createElement('img');
                imgElement.src = imageURL;
                imgElement.style.maxWidth = '150px';
                imgElement.style.maxHeight = '150px';
                imgElement.style.objectFit = 'cover';
                
                container.appendChild(imgElement);
            }
        }
    });
</script>

@endsection
