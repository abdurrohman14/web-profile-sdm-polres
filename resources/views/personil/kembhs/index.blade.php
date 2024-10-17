@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Riwayat Kemampuan Bahasa</h3>
        <button type="submit" class="btn btn-success"><a href="{{ route('personil.kembhs.create') }}" class="text-white text-decoration-none">Tambah Data</a></button>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="info-item d-flex mb-2">
                            <div class="label"><strong>Nama Lengkap</strong></div>
                            <div class="colon ml-2">:</div>
                            <div class="value ml-2 font-weight-bold">{{ $kembhs[0]->personel->nama_lengkap ?? '-' }}</div>
                        </div>
                        <table class="table border-0">
                            <thead>
                                <tr>
                                    <th>Kemampuan Bahasa</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kembhs as $kembhs)
                                <tr>
                                    <td>{{ $kembhs->bahasa }}</td>
                                    <td>{{ $kembhs->status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection