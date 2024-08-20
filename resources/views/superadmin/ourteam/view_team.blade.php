@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Ourteam</h3>
        <button type="submit" class="btn btn-primary"><a href="{{ route('create.team') }}" class="text-white text-decoration-none">Tambah Data</a></button>
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
                        <th>NRP</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ourteams as $key => $teams)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $teams->nama }}</td>
                        <td>{{ $teams->pangkat->nama }}</td>
                        <td>{{ $teams->jabatan->nama }}</td>
                        <td>{{ $teams->nrp }}</td>
                        <td><img src="{{ asset('storage/team/'.$teams->gambar) }}" width="50"></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('edit.team', $teams->id) }}" class="btn btn-sm btn-primary mr-1">Edit</a>
                            <form action="{{ route('delete.team', ['id' => $teams->id]) }}" method="post">
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