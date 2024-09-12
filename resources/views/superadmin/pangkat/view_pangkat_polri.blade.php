@extends('partials.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Pangkat Polri</h3>
        <button type="submit" class="btn btn-success"><a href="{{ route('create.pangkat') }}" class="text-white text-decoration-none">Tambah Data</a></button>
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
                    @foreach($pangkatPolri as $key => $pp)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $pp->nama }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('edit.pangkat', $pp->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-solid fa-pen"></i></a>
                            <form action="{{ route('delete.pangkat', ['id' => $pp->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-solid fa-trash"></i></button>
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