@extends('partials.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Edit Data</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('update.partner', ['id' => $partners->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg,.png,.jpeg,.gif">
                @if($partners->gambar)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $partners->gambar) }}" alt="" width="100">
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection