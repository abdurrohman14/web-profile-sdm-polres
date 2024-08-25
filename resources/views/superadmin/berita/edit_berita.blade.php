@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Edit Berita</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('update.berita', ['id' => $beritas->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="judul">Judul Berita</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $beritas->judul) }}">
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $beritas->slug) }}">
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gambar">Foto</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg,.png,.jpeg,.gif" value="{{ old('gambar', $beritas->gambar) }}">
                @if ($beritas->gambar)
                    <img src="{{ asset('storage/berita/' . $beritas->gambar) }}" id="photo-preview" alt="Pratinjau Gambar" class="mt-2" width="200px">
                @else
                    <p>Gambar belum tersedia</p>
                @endif
            </div>
            <div class="form-group">
                <label for="deskripsi">Isi</label>
                <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $beritas->deskripsi) }}">
                <trix-editor input="deskripsi" data-direct-upload-url="{{ route('upload') }}" data-persisted>{!! $beritas->deskripsi !!}</trix-editor>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <div class="col-sm-9">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="publish" value="1" {{ $beritas->status ? 'checked' : '' }} required>
                        <label class="form-check-label" for="publish">Publish</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="draft" value="0" {{ !$beritas->status ? 'checked' : '' }} required>
                        <label class="form-check-label" for="draft">Draft</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>

<script>
    const judul = document.querySelector('#judul');
    const slug = document.querySelector('#slug');
  
    judul.addEventListener('change', function() {
     fetch('/berita/create/checkSlug?judul=' + judul.value, {
      method: 'GET'
     }).then(response => response.json()).then(data => slug.value = data.slug);
    });
</script>

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

<script>
	document.addEventListener('trix-file-accept', function(event) {
		console.log('trix-file-accept event triggered');
		if (event.file) {
			// Cegah perilaku default untuk menghindari penyisipan file dua kali
			event.preventDefault();
	
			// Upload file
			uploadFile(event.file);
		}
	});
	
	function uploadFile(file) {
		console.log('uploadFile function called');
		
		var form = new FormData();
		form.append('file', file);
	
		var csrfToken = document.querySelector('meta[name="csrf-token"]');
		if (!csrfToken) {
			console.error('CSRF token meta tag not found');
			return;
		}
	
		fetch('{!! route("upload") !!}', {
			method: 'POST',
			body: form,
			headers: {
				'X-CSRF-TOKEN': csrfToken.getAttribute('content')
			}
		})
		.then(response => response.json())
		.then(data => {
			console.log('Response received:', data);
			if (data.url) {
				var imageUrl = data.url;
	
				// Sisipkan gambar ke dalam konten editor Trix hanya sekali
				var editor = document.querySelector("trix-editor");
				editor.editor.insertHTML(`<img src="${imageUrl}">`);
			} else {
				console.error('URL gambar tidak tersedia dalam respons JSON');
			}
		})
		.catch(error => {
			console.error('Error:', error);
		});
	}
</script>

@endsection