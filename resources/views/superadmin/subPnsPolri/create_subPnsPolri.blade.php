@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Tambah SubPNS</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('store.subPns') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="pangkat_pns_polri_id" class="form-label">Pangkat PNS</label>
                <select name="pangkat_pns_polri_id" id="pangkat_pns_polri_id" class="form-control select2" required>
                    <option value="" disabled selected>Select Pangkat</option>
                    @foreach($pangkatPns as $pPns)
                        <option value="{{ $pPns->id }}">{{ $pPns->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Nama SubPNS</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama SubPNS" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection