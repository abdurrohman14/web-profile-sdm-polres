@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">SubPangkat</h3>
        <button type="submit" class="btn btn-primary"><a href="{{ route('create.subPangkat') }}" class="text-white text-decoration-none">Tambah Data</a></button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if($subPangkat->isEmpty())
            <p>Tidak ada data</p>
            @else
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pangkat</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subPangkat as $key => $sbP)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $sbP->pangkatPolri->nama }}</td>
                        <td>{{ $sbP->nama }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('edit.subPangkat', $sbP->id) }}" class="btn btn-sm btn-primary mr-1">Edit</a>
                            <form action="{{ route('delete.subPangkat', ['id' => $sbP->id]) }}" method="post">
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
            @endif
        </div>
    </div>
</div>

@endsection