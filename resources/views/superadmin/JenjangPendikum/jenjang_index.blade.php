@extends('partials.main')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Jenjang Pendidikan</h3>
        <button type="submit" class="btn btn-success"><a href="{{ route('create.jenjang') }}" class="text-white text-decoration-none">Tambah Data</a></button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenjang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jenjangPendikum as $key => $jPk)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $jPk->nama }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('edit.jenjang', $jPk->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-solid fa-pen"></i></a>
                                <form id="delete-form-{{ $jPk->id }}" action="{{ route('delete.jenjang', ['id' => $jPk->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="confirmDelete(event, {{ $jPk->id }})" class="btn btn-sm btn-danger mr-1"><i class="fas fa-solid fa-trash"></i></button>
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