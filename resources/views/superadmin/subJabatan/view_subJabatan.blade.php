@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">SubJabatan</h3>
        <button type="submit" class="btn btn-success"><a href="{{ route('create.subJabatan') }}" class="text-white text-decoration-none">Tambah Data</a></button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if($subJabatan->isEmpty())
            <p>Tidak ada data</p>
            @else
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jabatan</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subJabatan as $key => $sbJ)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $sbJ->jabatan->nama }}</td>
                        <td>{{ $sbJ->nama }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('edit.subJabatan', $sbJ->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-solid fa-pen"></i></a>
                            <form action="{{ route('delete.subJabatan', ['id' => $sbJ->id]) }}" method="post">
                                @csrf
                                @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-solid fa-trash"></i></button>
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