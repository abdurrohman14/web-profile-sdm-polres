@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Detail</h3>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Nama</div>
            <div class="col-md-0 mr-3">:</div>
            <div class="col-md-7 px-0">{{ $dikpol->personel->nama_lengkap }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Tingkat</div>
            <div class="col-md-0 mr-3">:</div>
            <div class="col-md-7 px-0">{{ $dikpol->tingkat }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Tahun</div>
            <div class="col-md-0 mr-3">:</div>
            <div class="col-md-7 px-0">{{ $dikpol->tahun }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 font-weight-bold">Gambar</div>
            <div class="col-md-0 mr-3">:</div>
            <div class="col-md-7 px-0"><img src="{{ asset('storage/pendidikanKepolisian/'. $dikpol->gambar) }}" alt="" width="100px"></div>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('index.dikpol') }}" class="btn btn-danger">
            <i class="fas fa-arrow-left mr-1"></i>Kembali</a>
    </div>
</div>

@endsection