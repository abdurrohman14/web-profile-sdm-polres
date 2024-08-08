@extends('partials.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Jabatan</h3>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jabatan</th>
                        <th>Sub Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jabatan as $jbt)
                    <tr>
                        <td>{{ $jbt->id }}</td>
                        <td>{{ $jbt->nama }}</td>
                        <td>{{ $jbt->parent->nama ?? 'null' }}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-primary">Edit</a>
                            <form action="" method="post">
                                @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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