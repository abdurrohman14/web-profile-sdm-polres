@extends('partials.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">PNS Polri</h3>
        <button type="submit" class="btn btn-primary"><a href="{{ route('create.pns') }}" class="text-white text-decoration-none">Tambah Data</a></button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pangkat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pnsPolri as $key => $pns)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pns->nama }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('edit.pns', $pns->id) }}" class="btn btn-sm btn-primary mr-1">Edit</a>
                            <form action="{{ route('delete.pns', ['id' => $pns->id]) }}" method="post">
                                @csrf
                                @method('delete')
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