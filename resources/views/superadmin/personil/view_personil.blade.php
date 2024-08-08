@extends('partials.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Personil</h3>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Pangkat</th>
                        <th>PNS Polri</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personels as $personil)
                    <tr>
                        <td>{{ $personil->id }}</td>
                        <td>{{ $personil->nama_lengkap }}</td>
                        <td>{{ $personil->jabatan->nama }}</td>
                        <td>{{ $personil->pangkat->nama }}</td>
                        <td>{{ $personil->pangkatPnsPolri->nama }}</td>
                        <td>{{ $personil->user->name }}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-info">View</a>
                            <a href="" class="btn btn-sm btn-primary">Edit</a>
                            <form action="" method="post">
                                @csrf
                            <a href="" class="btn btn-sm btn-danger">Hapus</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection