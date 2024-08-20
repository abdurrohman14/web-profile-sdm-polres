@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Detail Berita</h3>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Judul Berita</div>
            <div class="col-md-0 mr-3">:</div>
            <div class="col-md-7 px-0">{{ $beritas->judul }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Deskripsi Berita</div>
            <div class="col-md-0 mr-3">:</div>
            <div class="col-md-7 px-0">{!! $beritas->deskripsi !!}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Gambar Berita</div>
            <div class="col-md-0 mr-3">:</div>
            <div class="col-md-7 px-0"><img src="{{ asset('storage/berita/'. $beritas->foto) }}" alt="" width="100px"></div>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('view.berita') }}" class="btn btn-danger">
            <i class="fas fa-arrow-left mr-1"></i>Kembali</a>
    </div>
</div>

@endsection