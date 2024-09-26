@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Riwayat Pangkat</h3>
        <button type="submit" class="btn btn-success"><a href="{{ route('create.riwayat-pangkat') }}" class="text-white text-decoration-none">Tambah Data</a></button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Pangkat</th>
                        <th>TMT</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ripat as $key => $riwpat)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $riwpat->personel->nama_lengkap }}</td>
                        <td>{{ $riwpat->pangkat }}</td>
                        <td>{{ $riwpat->tmt }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                {{-- <a href="{{ route('detail.pendidikan-umum', $riwpat->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-solid fa-eye"></i></a> --}}
                                <a href="{{ route('edit.riwayat-pangkat', $riwpat->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-solid fa-pen"></i></a>
                                <form id="delete-form-{{ $riwpat->id }}" action="{{ route('delete.riwayat-pangkat', $riwpat->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button onclick="confirmDelete(event, {{ $riwpat->id }})" type="submit" class="btn btn-sm btn-danger"><i class="fas fa-solid fa-trash"></i></button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection