@extends('partials.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h3 class="m-0 font-weight-bold text-primary">Kemampuan Bahasa</h3>
        {{-- <button type="submit" class="btn btn-success"><a href="{{ route('create.kemampuan-bahasa') }}" class="text-white text-decoration-none">Tambah Data</a></button> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Bahasa</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kemhas as $key => $mambas)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $mambas->personel->nama_lengkap }}</td>
                        <td>{{ $mambas->bahasa }}</td>
                        <td>{{ $mambas->status }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                {{-- <a href="{{ route('detail.pendidikan-umum', $mambas->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-solid fa-eye"></i></a> --}}
                                <a href="{{ route('edit.kemampuan-bahasa', $mambas->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-solid fa-pen"></i></a>
                                <form id="delete-form-{{ $mambas->id }}" action="{{ route('delete.kemampuan-bahasa', $mambas->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button onclick="confirmDelete(event, {{ $mambas->id }})" type="submit" class="btn btn-sm btn-danger"><i class="fas fa-solid fa-trash"></i></button>
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