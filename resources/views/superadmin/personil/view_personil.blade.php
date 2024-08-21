@extends('partials.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Personil</h3>
        <button type="submit" class="btn btn-primary"><a href="{{ route('create.personel') }}" class="text-white text-decoration-none">Tambah Data</a></button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Sub Jabatan</th>
                        <th>Pangkat</th>
                        <th>Gol Ruang</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personels as $key => $personil)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $personil->nama_lengkap }}</td>
                        <td>{{ $personil->jabatan->nama }}</td>
                        <td>{{ $personil->subJabatan->nama }}</td>
                        <td>{{ $personil->pangkat->nama }}</td>
                        <td>{{ $personil->pangkatPnsPolri->nama }}</td>
                        <td>{{ $personil->user->name }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('show.personel', $personil->id) }}" class="btn btn-sm btn-info mr-1">View</a>
                                <a href="{{ route('edit.personel', $personil->id) }}" class="btn btn-sm btn-primary mr-1">Edit</a>
                            <form action="{{ route('delete.personel', ['id' => $personil->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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