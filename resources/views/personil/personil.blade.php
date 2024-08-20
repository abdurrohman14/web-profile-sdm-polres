@extends('partials.main')
@section('content')

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informasi Data Diri</h6>
    </div>
    <div class="card-body">
        @foreach($personel as $person)
            <div class="person">
                <h5>{{ $person->nama_lengkap }}</h5>
                <p>{{ $person->user->name }}</p>
                <p>Jabatan: {{ $person->jabatan->nama }}</p>
                <p>Pangkat Polri: {{ $person->pangkat->nama }}</p>
                <p>Pangkat PNS Polri: {{ $person->pangkatPnsPolri->nama ?? 'N/A' }}</p>
            </div>
            <hr>
        @endforeach
    </div>
</div>

@endsection