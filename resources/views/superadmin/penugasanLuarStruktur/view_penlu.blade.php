@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Penugasan Luar Struktur</h3>
        {{-- <button type="submit" class="btn btn-success"><a href="{{ route('create.penlu') }}" class="text-white text-decoration-none">Tambah Data</a></button> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Penugasan</th>
                        <th>Lokasi</th>
                        {{-- <th>Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($penlu as $key => $penlus)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $penlus->personel->nama_lengkap }}</td>
                        <td>{{ $penlus->penugasan }}</td>
                        <td>{{ $penlus->lokasi }}</td>
                        {{-- <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('detail.pendidikan-umum', $penlus->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-solid fa-eye"></i></a>
                                <a href="{{ route('edit.penlu', $penlus->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-solid fa-pen"></i></a>
                                <form id="delete-form-{{ $penlus->id }}" action="{{ route('delete.penlu', $penlus->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button onclick="confirmDelete(event, {{ $penlus->id }})" type="submit" class="btn btn-sm btn-danger"><i class="fas fa-solid fa-trash"></i></button>
                            </form>
                            </div>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection