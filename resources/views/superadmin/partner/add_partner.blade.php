@extends('partials.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Tambah Data</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('store.partner') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg,.png,.jpeg,.gif" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
</div>
@endsection