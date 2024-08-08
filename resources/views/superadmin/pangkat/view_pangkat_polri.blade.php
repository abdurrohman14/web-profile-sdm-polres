@extends('partials.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Pangkat Polri</h3>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pangkat</th>
                        <th>Sub Pangkat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pangkatPolri as $pp)
                    <tr>
                        <td>{{ $pp->id }}</td>
                        <td>{{ $pp->nama }}</td>
                        <td>{{ $pp->parent->nama ?? 'null' }}</td>
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